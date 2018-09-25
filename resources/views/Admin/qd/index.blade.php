@extends('Sy/admin-app')
@section("title","签到")
@section("content")
    @foreach($users as $v)
        {{csrf_field()}}
        <input type="date" name="time" value="{{date("Y-m-d",$v -> time)}}" class="time">
        <button class="btn btn-app btn-back-message-list" id="qian">签到</button><span id="tis"></span>
        <span id="tij"></span>
        <table border="1" cellspacing="0" class="table mb30">
            <tr>
                <th>总签到数</th>
                <th>连续签到</th>
                <th>总分数</th>
            </tr>

            <tr>
            <tr>

                <td><span id="con">{{$v->con}}</span></td>
                <td><span id="l_con">{{$v->l_con}}</span></td>
                <td><span id="score">{{$v->score}}</span></td>
            </tr>
            </tr>
            @endforeach
        </table>
            <script type="application/javascript">
                //alert(1234566);
                $("#qian").on("click",function(){
                    $.ajax({
                        url:"/Qd/up",
                        type:"post",
                        dataType:"json",
                        data:{
                            _token:$("input[name='_token']").val(),
                            time:$(".time").val(),
                            l_con:$("#l_con").text(),
                            con:$("#con").text(),
                            score:$("#score").text()
                        },
                        success:function(rs){
                            $("#tij").html(rs.msg).css("color","red");
                            $("#con").html(rs.con);
                            $("#l_con").html(rs.l_con);
                            $("#score").html(rs.score);
                        }
                    })
                });
            </script>
@endsection