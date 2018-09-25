<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>2018xx互联网公司会抽奖现场</title>

    <link rel="stylesheet" href="/css/index.css"/>

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/easing.js"></script>

</head>
<body>
<!-- 主体盒子-->
<div class="main-box">
    <!-- 喜迎新年-->
    <div class="title-box">
        <img src="/images/pc-titile.png" alt=""/>
    </div>
    <!-- 装饰点缀-->
    <div class="desc-box">
        <img src="/images/dianzhui.png" alt=""/>
    </div>
    <div class="main">
        <!-- 数字背景盒子-->
        <div class="num-bg-box">
            <!-- 数字盒子-->
            <div class="num_box">
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
            </div>
        </div>
    </div>
</div>
<!-- 操作按钮-->
<div class="btn-box">
    <div class="btn start">开始抽奖</div>
    <div class="btn stop" >停止抽奖</div>
</div>
<div style="margin-top: 50px;width:100%;">
    <a href="/Cj/show">抽奖</a>
    <table style="margin: 10px auto; background: #f0f0f0; width:30%; text-align: left; padding: 5px 8px;">
        <tr><td style="text-align: center;"><h4>中奖者名单</h4></td></tr>
        @if(!empty($record_list))
            @foreach($record_list as $key => $record)
                <tr><td style="padding-left:7%;height: 30px;">{{$key+1}}&nbsp; {{$record['real_name']}} -- {{$record['phone']}}</td></tr>
            @endforeach
        @endif
    </table>
</div>



<!--js-->
<script>

    var u = 100;
    var n = 1;
    var timer; //定义滚动的定时器
    var result   = 18912345678; //指定中奖结果,可以抽取指定数组中的某一个
    var isBegin  = false; //标识能否开始抽奖

    $(".num").css('backgroundPositionY',200);//开始13888888888
    $(".num").eq(0).css('backgroundPositionY',-100)
    $(".num").eq(1).css('backgroundPositionY',-300)

    //执行数字滚动
    function run(){
        n++;
        $(".num").each(function(index){
            var _num = $(this);
            _num.animate({
                backgroundPositionY: ((u+1)*n*(index+1))
            },100);

        });
        timer = window.setTimeout(run,100);
        isBegin = true ;
    }
    $(function(){
        //开始抽奖
        $('.start').click(function(){
            if(isBegin){
                return false;
            }else{
                run();
            }
        });
        //停止抽奖
        $('.stop').click(function(){
            $.ajax({
                url:'/Cj/info',
                type: "get",
                dataType: "json",
                data: {user_id:1, act_id:1},
                success:function (res) {

                    if(res.code == 200) {
                        var num_arr = (res.data+'').split('');

                        $(".num").each(function(index){
                            var _num = $(this);
                            setTimeout(function(){
                                _num.animate({
                                    backgroundPositionY: (u*60) - (u*num_arr[index])
                                },{
                                    duration: 500,
                                    easing: "easeInOutCirc",
                                    complete: function(){
                                        if(index == 10){
                                            isBegin = false;
                                        }
                                    }
                                });
                            },100);
                        });
                    }else {
                        alert(res.msg);
                    }
                },
                error: function (res) {

                }

            });
            window.clearTimeout(timer);
            isBegin = false ;
        });
    });
</script>

</body>
</html>