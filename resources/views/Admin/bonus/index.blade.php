@extends('Sy/admin-app')
@section("title","发红包")
@section("content")
    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div>

                <h4 class="panel-title">发红包</h4>
                </div>
            <div class="panel-body panel-body-nopadding">
                <form class="form-horizontal form-bordered" method="post" onsubmit="return false" id="tj">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">设置红包口令</label>
                        <div class="col-sm-6">
                            <input type="text" name="pwd" placeholder="例：恭喜发财" class="form-control pwd" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">红包个数</label>
                        <div class="col-sm-6">
                            <input type="text" name="nums" placeholder="个" class="form-control nums" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="readonlyinput">红包金额</label>
                        <div class="col-sm-6">
                            <input type="text" name="amount" class="form-control amount" placeholder="元" />
                        </div>
                    </div>



                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" value="塞钱" class="btn btn-primary btn-danger" id="btn"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- panel-body -->


            </div><!-- panel-footer -->

        </div><!-- panel -->

    <div>
        <span class="msg"></span>
        <table border="1" cellspacing="0" class="table mb30" style="background: gainsboro; color: #0b6ab9;">
            <tr>
                <th>红包id</th>
                <th>剩余金额</th>
                <th>剩余个数</th>
                <th>操作</th>
            </tr>
            @if(!empty($users))
            @foreach($users as $v)
                <tr id="con">
                    <td>{{$v -> id}}</td>
                    <td>{{$v -> amount}}</td>
                    <td>{{$v -> nums}}</td>
                    <td>
                        @if($v->amount ==0 || $v->nums ==0)
                        <button class="btn-primary btn-danger disabled">红包没了</button>
                        @else
                            <button class="btn-primary btn-danger qhb" data-id="{{$v->id}}" data-user-id="{{ rand(1,1000) }}" data-pwd="{{$v->pwd}}" >抢红包</button>
                        @endif
                    </td>
                </tr>
            @endforeach
                @endif

        </table>
        <div align="center"><span color="red" id="ts"></span></div>
    </div>

    </div><!-- contentpanel -->
    <script>
       /* $("#btn").click(function(){
            var num=$(".nums").val();
            var pwd=$(".pwd").val();
            var amount=$(".amount").val()
            $.ajax({
                url:"/Bonus/getBouns",
                type:"get",
               dataType:"json",
                data:{
                    nums:num,
                    pwd:pwd,
                    amount:amount
                },
                success:function(o){
                    console.log(o);
                },
                error:function(){

                }

            })
        })*/
        $(".qhb").click(function(){
            var data_id = $(this).attr('data-id');
            var data_user_id = $(this).attr('data-user-id');
            var data_pwd = $(this).attr('data-pwd');
            var _token = $("input[name='_token']").val();
            $(this).parent().html('<input type="text" class="pwd1"/>');
            $(".pwd1").focus();
            $(document).on("blur", ".pwd1", function () {
                var a = $(".pwd1").val();
                $(this).parent().html("<button class=\"btn-primary btn-danger qhb\" data-id=\"{{$v->id}}\" data-user-id=\"{{ rand(1,1000) }}\" data-pwd=\"{{$v->pwd}}\" >抢红包</button>");
                $.ajax({
                    url:"/Bonus/getBag",
                    type:"post",
                    dataType:"json",
                    data:{
                        pwd1:a,
                        bonus_id:data_id,
                        user_id:data_user_id,
                        pwd:data_pwd,
                        _token:_token
                    },
                    success:function(o){
                        $(".msg").html(o.msg).css('color','red');
                    },
                    error:function(){

                    }

                })


            })

        })
    </script>
@endsection

