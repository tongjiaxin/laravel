@extends('Sy/admin-app')
@section("title","最新小说")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 书城 <span>Subtitle goes here...</span></h2>
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
        <a class="btn btn-primary btn-danger" href="/Film/add">上新小说</a>&nbsp;
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>小说标题</th>
                        <th>海报</th>
                        <th>状态</th>
                        <th>标签</th>
                        <th>类型</th>
                        <th>作者</th>
                        <th>简介</th>
                        <th>创建时间</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                    @foreach($users as $v)
                        <tbody>
                        <tr>
                            <td>{{$v->title}}</td>
                            <td>
                                <img src="{{$v->Image_url}}" width="60px" height="60px">
                            </td>
                            <td>
                                @if($v->status==1)
                                    <button style="background: green;">正常</button>
                                    @else
                                <button style="background: red;">注销</button>
                                    @endif
                            </td>
                            <td>{{$v->tags}}</td>
                            <td>
                                @foreach($user as $a)
                                    @if($a->id==$v->Type_id)
                                        {{$a->type_name}}
                                    @endif
                                    @endforeach
                            </td>
                            <td>
                                @foreach($list as $a)
                                    @if($a->id==$v->Author_id)
                                        {{$a->author_name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$v->description}}</td>
                            <td>{{$v->created_at}}</td>
                            <td><a class="btn btn-xs btn-danger" href="/Film/del?id={{$v->id}}">删除</a>
                                <a class="btn btn-xs btn-primary" href="/Film/read?id={{$v->id}}">免费阅读</a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                {{$users->links()}}

            </div><!-- table-responsive -->
        </div>

    </div><!-- row -->
@endsection