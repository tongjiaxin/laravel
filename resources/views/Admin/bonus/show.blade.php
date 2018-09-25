@extends('Sy/admin-app')
@section("title","领取红包")
@section("content")


    <div>
        <table border="1" cellspacing="0" class="table mb30" style="background: gainsboro; color: #0b6ab9;">
            <tr>
                <th>红包金额</th>
                <th>用户id</th>
                <th>红包id</th>
                <th>是否运气王</th>
            </tr>
                @foreach($users as $v)
                    <tr id="con">
                        <td>{{$v -> money}}</td>
                        <td>{{$v -> user_id}}</td>
                        <td>{{$v -> bonus_id}}</td>
                        <td>
                            @if($v->is_max==1)
                                <button class="btn-primary btn-danger">是</button>
                            @else
                                <button class="btn-primary btn-danger" >否</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>

    </div><!-- contentpanel -->
@endsection

