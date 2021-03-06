@extends('Sy/admin-app')
@section("title","添加作者")
@section("content")
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 添加作者 <span>Subtitle goes here...</span></h2>
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
            <strong>Well done!</strong> You successfully read this <a href="" class="alert-link">important alert message</a>.
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div>

                <h4 class="panel-title">作者</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/Leader/add11">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">作者姓名</label>
                        <div class="col-sm-6">
                            <input type="text" name="author_name" placeholder="请输入作者姓名" class="form-control" />
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