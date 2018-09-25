@extends('Sy/admin-app')
@section("title","权限列表")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 权限列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li><a href="general-forms.html">Forms</a></li>
                <li class="active">General Forms</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-6" style="margin-top: 10px; margin-left: 8px;margin-bottom: 20px;">
        <a class="btn btn-primary btn-danger" href="/Permission/add">添加权限</a>&nbsp;
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>显示名称</th>
                        <th>是否菜单</th>
                        <th>排序</th>
                        <th>创建时间</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    @foreach($users as $v)
                    <tbody>
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td>@if($v->is_menu==1)<button class="btn-primary btn-danger">是</button>
                                @else<button class="btn-primary btn-danger">否</button>
                            @endif</td>
                        <td>{{$v->sort}}</td>
                        <td>{{$v->created_at}}</td>
                        <td><a class="btn btn-xs btn-danger" href="/Permission/del?id={{$v->id}}">删除</a>
                            <a class="btn btn-xs btn-primary" href="/Permission/info?id={{$v->id}}">修改</a>
                            <a class="btn btn-xs btn-primary" href="/Permission/son?id={{$v->id}}">子查询</a>
                        </td>

                    </tr>
                    </tbody>
                        @endforeach
                </table>{{--{{ $users->links() }}--}}
            </div><!-- table-responsive -->
        </div>

    </div><!-- row -->
@endsection