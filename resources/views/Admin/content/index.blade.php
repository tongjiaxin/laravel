@extends('Sy/admin-app')
@section("title","评论列表")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 评论列表 <span>Subtitle goes here...</span></h2>
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
        <a class="btn btn-primary btn-danger" href="/Content/add">发表评论</a>&nbsp;
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>网名</th>
                        <th>头像</th>
                        <th>标题</th>
                        <th>评论内容</th>
                        <th>评论时间</th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead> @foreach($user as $v)
                    <tr>

                            <td>{{$v['id']}}</td>
                            <td>{{$v['username']}}</td>
                            <td>
                                <img src="{{$v['image_url']}}" style="width:80px; height: 80px;">

                            </td>
                            <td>{{$v['title']}}</td>
                            <td>{{$v['content']}}</td>
                            <td>{{$v['created_at']}}</td>

                    </tr>
                        </tbody>
                    @endforeach
                </table>

            </div><!-- table-responsive -->
        </div>

    </div><!-- row -->
@endsection