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
                <form class="form-horizontal form-bordered" method="post" action="/Ball/add2">
                    {{csrf_field()}}
                    @foreach($users as $v)
                    <h3 style="text-align: center;">我要竞猜</h3>
                    <div style="text-align: center;">
                        <span>{{$v['qd1']}}</span>
                        <input type="hidden" name="qd1" value="{{$v['qd1']}}">
                        <input type="hidden" name="qd2" value="{{$v['qd2']}}">
                        <span style="font-size: 25px; margin-left: 10px; margin-right: 10px;">VS</span>
                        <span>{{$v['qd2']}}</span>
                        <br><br>
                        <input type="radio" value="1" name="sf">胜
                        <input type="radio" value="0" name="sf">负
                        <input type="radio" value="2" name="sf">平局
                        <br><br><br>
                        <input type="hidden" name="id" value="{{$v['id']}}">
                        <input type="submit" value="确定">
                    </div>
                        @endforeach


                </form>

            </div><!-- panel-body -->


        </div><!-- panel-footer -->

    </div><!-- panel -->


    </div><!-- contentpanel -->
    <script>

    </script>
@endsection

