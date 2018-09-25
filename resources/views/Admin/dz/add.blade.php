@extends('Sy/admin-app')
@section("title","发表文章")
@section("content")
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 发表文章 <span>Subtitle goes here...</span></h2>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div>

                <h4 class="panel-title">说说</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/Dz/add1">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">文章标题</label>
                        <div class="col-sm-6">
                        <input type="text" name="title" placeholder="请输入文章标题" class="form-control" />
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">文章内容</label>
                        <div class="col-sm-6">
                            <input type="text" name="content" placeholder="请输入文章内容" class="form-control" style="width: 300px;height: 200px;" />
                            <input type="hidden" value="0" name="num">
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" value="添加" class="btn btn-primary btn-danger"/>&nbsp;
                            </div>
                        </div>
                    </div>
                </form>

            </div><!-- panel-body -->

            <!-- panel-footer -->

        </div><!-- panel -->



    </div><!-- contentpanel -->
@endsection