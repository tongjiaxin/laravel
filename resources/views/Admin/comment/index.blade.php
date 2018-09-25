<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>仿微博评论</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/comment.css">
</head>
<body>
<!--
    此评论textarea文本框部分使用的https://github.com/alexdunphy/flexText此插件
-->
<div class="commentAll">
    <!--评论区域 begin-->
    <div class="reviewArea clearfix">
        <textarea id="content" class="content comment-input" placeholder="Please enter a comment&hellip;" onkeyup="keyUP(this)"></textarea>
        <a href="javascript:;" class="plBtn">评论</a>
    </div>
    <!--评论区域 end-->
    <!--回复区域 begin-->
    <div class="comment-show">
        <?php foreach ($list as $v):?>
        <div class="comment-show-con clearfix">

            <div class="comment-show-con-img pull-left"><img style="width:40px;height: 40px;" src="<?= $v['image_url']?>" alt=""></div>
            <!---->
            <div class="comment-show-con-list pull-left clearfix">
                <div class="pl-text clearfix">
                    <a href="#" class="comment-size-name"><?= $v['username']?> : </a>
                    <span class="my-pl-con">&nbsp;<?= $v['comment']?></span>
                </div>
                <div class="date-dz">
                    <span class="date-dz-left pull-left comment-time"><?= $v['time']?></span>
                    <div class="date-dz-right pull-right comment-pl-block">
                        <a href="" class="removeBlock">删除</a>
                        <input type="hidden" class="id" name="id" value="<?= $v['id']?>">
                        <a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>
                        <span class="pull-left date-dz-line">|</span>
                        <a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a>
                    </div>

                    <?php if(!empty($user)):?>
                    <?php foreach ($user as $a):?>
                    <?php if($a['id']==$v['id']):?>
                    <div style="margin-top: 50px;">
                        <span style="font-size: 20px;"><?= $a['username']?> : </span>
                        <span>评论了你：</span>
                        <span style="font-size: 13px; color: grey">&nbsp;<?= $a['hf_content']?></span>
                        <p style="font-size: 12px;color:grey"><?= $a['hf_time']?></p>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>

                </div>
            </div>

            <div class="hf-list-con"></div></div>
        <?php endforeach;?>
    </div>
    <!--回复区域 end-->
</div>



<script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.flexText.js"></script>
<!--textarea高度自适应-->
<script type="text/javascript">
    $(function () {
        $('.content').flexText();
    });
</script>
<!--textarea限制字数-->
<script type="text/javascript">
    function keyUP(t){
        var len = $(t).val().length;
        if(len > 139){
            $(t).val($(t).val().substring(0,140));
        }
    }
</script>
<!--点击评论创建评论条-->
<script type="text/javascript">
    $('.commentAll').on('click','.plBtn',function(){
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        //获取输入内容
        var content=$("#content").val();
        var user_id=1;

        $.ajax({
            url:"/Comment/add",
            type:"get",
            dataType:"json",
            data:{
                time:now,
                comment:content,
                user_id:user_id
            },
            success:function(rs){
                if(rs.code==200){
                    location.reload(0);
                }
            }
        })
    });
</script>
<!--点击回复动态创建回复块-->
<script type="text/javascript">
    $('.comment-show').on('click','.pl-hf',function(){
        //获取回复人的名字
        var fhName = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
        //回复@
        var fhN = '回复@'+fhName;
        //var oInput = $(this).parents('.date-dz-right').parents('.date-dz').siblings('.hf-con');
        var fhHtml = '<div class="hf-con pull-left"> <textarea class="content comment-input hf-input" placeholder="" onkeyup="keyUP(this)"></textarea> <a href="javascript:;" class="hf-pl">评论</a></div>';
        //显示回复
        if($(this).is('.hf-con-block')){
            $(this).parents('.date-dz-right').parents('.date-dz').append(fhHtml);
            $(this).removeClass('hf-con-block');
            $('.content').flexText();
            $(this).parents('.date-dz-right').siblings('.hf-con').find('.pre').css('padding','6px 15px');
            //console.log($(this).parents('.date-dz-right').siblings('.hf-con').find('.pre'))
            //input框自动聚焦
            $(this).parents('.date-dz-right').siblings('.hf-con').find('.hf-input').val('').focus().val(fhN);
        }else {
            $(this).addClass('hf-con-block');
            $(this).parents('.date-dz-right').siblings('.hf-con').remove();
        }
    });
</script>
<!--评论回复块创建-->
<script type="text/javascript">
    $('.comment-show').on('click','.hf-pl',function(){
        var oThis = $(this);
        var myDate = new Date();
        //获取当前年
        var year=myDate.getFullYear();
        //获取当前月
        var month=myDate.getMonth()+1;
        //获取当前日
        var date=myDate.getDate();
        var h=myDate.getHours();       //获取当前小时数(0-23)
        var m=myDate.getMinutes();     //获取当前分钟数(0-59)
        if(m<10) m = '0' + m;
        var s=myDate.getSeconds();
        if(s<10) s = '0' + s;
        var now=year+'-'+month+"-"+date+" "+h+':'+m+":"+s;
        //获取输入内容
        var oHfVal=$(".hf-input").val();
        //console.log(oHfVal);
        var oHfName = $(this).parents('.hf-con').parents('.date-dz').siblings('.pl-text').find('.comment-size-name').html();
        //用户名
        var id=$(".id").val();
        var oAllVal = '回复@'+oHfName;
        $.ajax({
            url: "/Comment/add1",
            type: "get",
            dataType: "json",
            data: {
                hf_name: oAllVal,
                hf_time: now,
                hf_content: oHfVal,
                hf_id: 2,
                id: id
            },
            success: function (rs) {
                if (rs.code == 200) {
                    location.reload(0);
                }
            }
        })
    });
</script>
<!--删除评论块-->
<script type="text/javascript">
    $('.commentAll').on('click','.removeBlock',function(){
        var oT = $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con');
        if(oT.siblings('.all-pl-con').length >= 1){
            oT.remove();
        }else {
            $(this).parents('.date-dz-right').parents('.date-dz').parents('.all-pl-con').parents('.hf-list-con').css('display','none')
            oT.remove();
        }
        $(this).parents('.date-dz-right').parents('.date-dz').parents('.comment-show-con-list').parents('.comment-show-con').remove();

    })
</script>
<!--点赞-->
<script type="text/javascript">
    $('.comment-show').on('click','.date-dz-z',function(){
        var zNum = $(this).find('.z-num').html();
        if($(this).is('.date-dz-z-click')){
            zNum--;
            $(this).removeClass('date-dz-z-click red');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').removeClass('red');
        }else {
            zNum++;
            $(this).addClass('date-dz-z-click');
            $(this).find('.z-num').html(zNum);
            $(this).find('.date-dz-z-click-red').addClass('red');
        }
    })
</script>
</body>
</html>