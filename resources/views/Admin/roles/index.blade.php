@extends('Sy/admin-app')
@section("title","角色列表")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 角色列表 <span>Subtitle goes here...</span></h2>
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
        <a class="btn btn-primary btn-danger" href="/Roles/add">添加角色</a>&nbsp;
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>角色名字</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    @foreach($users as $v)
                        <tbody>
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->Role_name}}</td>
                            <td><a class="btn-primary btn-danger" href="/Roles/del?id={{$v->id}}">删除</a>
                                <a class="btn-primary btn-danger" href="/Roles/info?id={{$v->id}}">修改</a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div><!-- table-responsive -->
        </div>

    </div><!-- row -->
@endsection