@extends('Sy/admin-app')
@section("title","用户列表")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 用户列表 <span>Subtitle goes here...</span></h2>
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
        <a class="btn btn-primary btn-danger" href="/AdminUser/add">添加用户</a>&nbsp;
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>用户头像</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>是否超管</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    @foreach($users as $v)
                        <tbody>
                        <tr>
                            <td>
                                <img src="{{$v->image_url}}" width="60px" height="60px">
                            </td>
                            <td>{{$v->username}}</td>
                            <td>{{$v->password}}</td>
                            <td>@if($v->is_super==1)<button class="btn-primary btn-danger">是</button>
                                @else<button class="btn-primary btn-danger">否</button>
                                @endif</td>
                            <td>@if($v->status==1)<button class="btn-primary btn-danger">正常</button>
                                @else<button class="btn-primary btn-danger">注销</button>
                                @endif</td>
                            <td>{{$v->created_at}}</td>
                            <td><a class="btn btn-xs btn-primary" href="/AdminUser/info?id={{$v->id}}">修改</a>
                                <a class="btn btn-xs btn-danger" href="/AdminUser/del?id={{$v->id}}">删除</a></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div><!-- table-responsive -->
        </div>

    </div><!-- row -->
@endsection