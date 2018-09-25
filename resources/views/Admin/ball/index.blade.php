@extends('Sy/admin-app')
@section("title","足球竞猜")
@section("content")
<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">&times;</a>
                <a href="" class="minimize">&minus;</a>
            </div>

            <h4 class="panel-title">足球竞猜</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered" method="post" action="/Ball/add">
                {{csrf_field()}}
                    <h3 style="text-align: center;">添加竞猜球队</h3>
                <div style="text-align: center;">
                <select name="qd1" id="" style=" width: 100px;height: 40px; font-size: 20px;">
                    <option value="意大利">意大利</option>
                    <option value="西班牙">西班牙</option>
                    <option value="俄罗斯">俄罗斯</option>
                    <option value="伊朗">伊朗</option>
                    <option value="葡萄牙">葡萄牙</option>
                </select>
                    <span style="font-size: 25px; margin-left: 10px; margin-right: 10px;">VS</span>
                    <select name="qd2" id="" style=" width: 100px;height: 40px; font-size: 20px;">
                        <option value="葡萄牙">葡萄牙</option>
                        <option value="意大利">意大利</option>
                        <option value="西班牙">西班牙</option>
                        <option value="俄罗斯">俄罗斯</option>
                        <option value="伊朗">伊朗</option>
                    </select>
                    <br><br>
                    <p><h4>结束竞猜时间</h4><input type="date" name="time"></p>
                    <br><br><br>
                    <input type="hidden" name="sf" value="{{rand(0,2)}}">
                    <input type="submit" value="添加">
                </div>


            </form>

        </div><!-- panel-body -->


    </div><!-- panel-footer -->

</div><!-- panel -->

<div>
    <h3 style="text-align: center;">竞猜列表</h3>
    <table border="1" cellspacing="0" class="table mb30" style="background: gainsboro; color: #0b6ab9;">
        <tr>
            <th>竞猜球队</th>
            <th>操作</th>
        </tr>
        @foreach($users as $v)
            <tr>
            <td>{{$v['qd1']}} VS {{$v['qd2']}}</td>
            <td>
                @if(time()>$v['time'])
                    <a href="/Ball/info?id={{$v['id']}}">查看结果</a>
                @else
                    <a href="/Ball/add1?id={{$v['id']}}">竞猜</a>
                @endif
            </td>
            </tr>
        @endforeach
    </table>
</div>

</div><!-- contentpanel -->
<script>

</script>
@endsection

