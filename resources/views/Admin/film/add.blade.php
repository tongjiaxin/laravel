@extends('Sy/admin-app')
@section("title","添加小说")
@section("content")
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 添加小说信息 <span>Subtitle goes here...</span></h2>
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

                <h4 class="panel-title">小说信息</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/Film/add1" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">小说名称</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" placeholder="请输入小说名称" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">小说海报</label>
                        <div class="col-sm-6">
                            <input type="file" name="Image_url"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">状态</label>
                        <div class="col-sm-6">
                            <input type="radio" name="status" value="1" checked />正常       <input type="radio" name="status" value="0" />注销
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">小说标签</label>
                        <div class="col-sm-6">
                            <input type="text" name="tags" placeholder="请输入小说标签" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">类型</label>
                        <div class="col-sm-6">
                            <select name="Type_id" class="form-control"  style="height: 40px; width:100px;">
                                @foreach($user as $v)
                                <option value="{{$v->id}}">{{$v->type_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">作者</label>
                        <div class="col-sm-6">
                            <select name="Author_id" class="form-control"  style="height: 40px; width:100px;">
                                @foreach($users as $v)
                                    <option value="{{$v->id}}">{{$v->author_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">简介</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" placeholder="请输入详细剧情" class="form-control" style="height: 150px;width: 200px;" />
                        </div>
                    </div>

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