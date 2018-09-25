@extends('Sy/admin-app')
@section("title","权限角色分配")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 权限角色分配 <span>Subtitle goes here...</span></h2>
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
        <a class="btn btn-primary btn-danger" href="/Permission_role/add">添加权限</a>&nbsp;
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>角色ID</th>
                        <th>权限ID</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    @foreach($users as $v)
                        <tbody>
                        <tr>
                            <td>{{$v->Role_id}}</td>
                            <td>{{$v->Permission_id}}</td>
                            <td><a class="btn btn-xs btn-danger" href="/Permission_role/del?id={{$v->Role_id}}">删除</a>
                                <a class="btn btn-xs btn-primary" href="/Permission_role/info?id={{$v->Role_id}}">修改</a>
                            </td>

                        </tr>
                        </tbody>
                    @endforeach
                </table>{{--{{ $users->links() }}--}}
            </div><!-- table-responsive -->
        </div>

    </div><!-- row -->
@endsection