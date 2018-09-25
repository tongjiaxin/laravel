@extends('Sy/admin-app')
@section("title","列表页面")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-table"></i> 点赞 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li class="active">Tables</li>
            </ol>
        </div>
    </div>
<div style="margin-top: 10px;margin-left: 10px;">
        <a href="/Dz/add" class="btn btn-primary btn-danger">发表文章</a>
</div>
    <div class="contentpanel">

        <div class="row">

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-primary mb30">
                        <thead>
                        <tr>
                            <th>文章ID</th>
                            <th>文章标题</th>
                            <th>文章内容</th>
                            <th>点赞次数</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $v)
                        <tr>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['title']}}</td>
                            <td>{{$v['content']}}</td>
                            <td><span class="nums">{{$v['num']}}</span>次&nbsp;&nbsp;<a class="btn btn-xs btn-primary" href="/Dz/info?id={{$v['id']}}&admin_id={{13}}">点赞</a>
                            </td>
                            <td><a class="btn btn-xs btn-danger" href="/Dz/del?id={{$v['id']}}">删除</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection