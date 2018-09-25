@extends('Sy/admin-app')
@section("title","发表评论")
@section("content")
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 发表评论 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li><a href="general-forms.html">Forms</a></li>
                <li class="active">General Forms</li>
            </ol>
        </div>
    </div>
    <div class="contentpanel">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <a href="" class="alert-link" id="msg"></a>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div>

                <h4 class="panel-title">发表评论</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/Content/add1" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">评论标题</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" placeholder="请输入评论标题" class="form-control" />
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">评论内容</label>
                        <div class="col-sm-6">
                            <input type="text" name="content" placeholder="请输入评论内容" class="form-control" style="height: 150px;width: 200px;" />
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{$user_info['id']}}">
                    {{--<input type="hidden" name="username" value="{{$user_info['username']}}">
                    <input type="hidden" name="image">--}}
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" value="添加小说信息" class="btn btn-primary btn-danger"/>&nbsp;
                            </div>
                        </div>
                    </div>

                </form>

            </div><!-- panel-body -->

            <!-- panel-footer -->

        </div><!-- panel -->



    </div><!-- contentpanel -->
@endsection