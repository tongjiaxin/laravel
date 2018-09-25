@extends('Sy/admin-app')
@section("title","小说配置列表")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 小说章节列表 <span>Subtitle goes here...</span></h2>
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
        <a class="btn btn-primary btn-danger" href="/Leader/add">添加小说章节</a>&nbsp;
        <a class="btn btn-primary btn-danger" href="/Film/index">返回书城</a>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>小说ID</th>
                        <th>小说名称</th>
                        <th>章节标题</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    @foreach($user as $v)
                        <tbody>
                        @foreach($users as $a)
                        <tr>

                            <td>{{$v->Novel_id}}</td>
                            <td>{{$a->title}}</td>
                            <td>{{$v->title}}</td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="/Leader/del?id={{$v->id}}">删除此章节</a>
                                <a class="btn btn-xs btn-danger" href="/Film/content?id={{$v->id}}">阅读内容</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div><!-- table-responsive -->
        </div>

    </div>


@endsection