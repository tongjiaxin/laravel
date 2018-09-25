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
                    @foreach($user as $v)
                        <h3 style="text-align: center;">比赛结果</h3>
                        <div style="text-align: center;">
                            <span>{{$v['qd1']}}</span>
                            <span style="font-size: 25px; margin-left: 10px; margin-right: 10px;">
                                @if($v['sf']==0)
                                    胜
                                @elseif($v['sf']==1)
                                负
                                @elseif($v['sf']==2)
                                平局
                                @endif
                            </span>
                            <span>{{$v['qd2']}}</span>

                            <br><br><br>
                            <input type="hidden" name="id" value="{{$v['id']}}">
                        </div>

                @foreach($users as $a)
                        <h3 style="text-align: center;">您的竞猜结果</h3>
                        <div style="text-align: center;">
                            <span>{{$a['qd1']}}</span>
                            <span style="font-size: 25px; margin-left: 10px; margin-right: 10px;">
                                @if($a['sf']==0)
                                    胜
                                @elseif($a['sf']==1)
                                    负
                                @elseif($a['sf']==2)
                                    平局
                                @endif
                            </span>
                            <span>{{$a['qd2']}}</span>
                            @if($a['sf']==$v['sf'])
                                <h3>恭喜您！竞猜对了！</h3>
                            @else
                                <h3>很抱歉！您没有猜对！</h3>
                            @endif

                            <br><br><br>
                        </div>

                    @endforeach
                @endforeach


            </div><!-- panel-body -->


        </div><!-- panel-footer -->

    </div><!-- panel -->


    </div><!-- contentpanel -->
    <script>

    </script>
@endsection

