@extends('Sy/admin-app')
@section("title","修改权限节点")
@section("content")
<div class="pageheader">
    <h2><i class="fa fa-edit"></i> 修改权限节点 <span>Subtitle goes here...</span></h2>
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

            <h4 class="panel-title">权限表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
            <form class="form-horizontal form-bordered" method="post" action="/Permission/info1">
                @foreach($users as $users)
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">父级分类</label>
                    <div class="col-sm-6">
                        <select name="fid" id="fid" style="width:110px; height: 30px;">
                            @foreach($user as $v)
                                @if($users['fid']==$v['id'])
                            <option value="{{$v->id}}" checked="">{{$v->name}}</option>
                                @else
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="disabledinput">权限名称</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" placeholder="请输入权限名称" class="form-control" value="{{$users->name}}" />
                    </div>
                </div>
                    <input type="hidden" name="id" value="{{$users->id}}">

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="readonlyinput" >权限url</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$users->url}}" name="url" placeholder="请输入权限url" class="form-control" />
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">是否菜单</label>
                    <div class="col-sm-6">
                        @if($users->is_menu==1)
                            <div class="radio"><label><input type="radio" name="is_menu" value="1" checked="">是</label></div>
                            <div class="radio"><label><input type="radio" name="is_menu" value="0">否</label></div>
                        @else
                        <div class="radio"><label><input type="radio" name="is_menu" value="1">是</label></div>
                        <div class="radio"><label><input type="radio" name="is_menu" value="0" checked="">否</label></div>
                            @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="disabledinput">排序</label>
                    <div class="col-sm-6">
                        <input type="text" name="sort" value="{{$users->sort}}" placeholder="请输入权限排序" class="form-control" />
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" value="修改" class="btn btn-primary btn-danger"/>&nbsp;
                        </div>
                    </div>
                </div>
                @endforeach
            </form>

        </div><!-- panel-body -->

        <!-- panel-footer -->

    </div><!-- panel -->



</div><!-- contentpanel -->
@endsection