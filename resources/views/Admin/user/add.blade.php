@extends('Sy/admin-app')
@section("title","添加用户")
@section("content")
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 添加用户信息 <span>Subtitle goes here...</span></h2>
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

                <h4 class="panel-title">用户信息</h4>
            </div>
            <div class="panel-body panel-body-nopadding">

                <form class="form-horizontal form-bordered" method="post" action="/AdminUser/add1" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">角色名称</label>
                        <div class="col-sm-6">
                            <select name="role_id" class="form-line" style="height: 30px;" >
                                    @foreach($users as $v)
                                        <option value="{{$v -> id}}">{{$v ->Role_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">用户ID</label>
                        <div class="col-sm-6">
                            <input type="text" name="id" placeholder="请输入用户ID" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">用户名</label>
                        <div class="col-sm-6">
                            <input type="text" name="username" placeholder="请输入用户名称" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">密码</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" placeholder="请输入密码" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="disabledinput">用户头像</label>
                        <div class="col-sm-6">
                            <input type="file" name="image_url"  />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否超管</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input type="radio" name="is_super" value="1">是</label></div>
                            <div class="radio"><label><input type="radio" name="is_super" value="0" checked="">否</label></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">是否管理员</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input type="radio" name="is_admin" value="1">否</label></div>
                            <div class="radio"><label><input type="radio" name="is_admin" value="2" checked="">是</label></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">状态</label>
                        <div class="col-sm-6">
                            <div class="radio"><label><input type="radio" name="status" value="1" checked="">正常</label></div>
                            <div class="radio"><label><input type="radio" name="status" value="2" >注销</label></div>
                        </div>
                    </div>
                    <label class="col-sm-3 control-label">用户权限</label>
                    <div  class="form-group">
                    @foreach($menu as $v)
                        <div class="top-permission col-md-12 ">

                            <a href="javascript:;" class="display-sub-permission-toggle">
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>
                            <input type="checkbox" name="Permission_id[]" value="{{$v['id']}}"
                                   class="top-permission-checkbox"/>
                            <label><h5>{{$v['name']}}</h5></label>
                        </div>
                        @if(isset($v['son']))
                            <div class="sub-permissions col-md-11 col-md-offset-1">
                                @foreach($v['son'] as $a)

                                    <div class="col-sm-3">
                                        <label><input type="checkbox" name="Permission_id[]"
                                                      value="{{$a['id']}}"
                                                      class="sub-permission-checkbox" />&nbsp;&nbsp;<span
                                                    class="fa fa-bars"></span>{{$a['name']}}
                                        </label>
                                        {{--<label><input type="checkbox" name="Permission_id[]"
                                                      value=""
                                                      class="sub-permission-checkbox" />&nbsp;&nbsp;测试信息
                                        </label>--}}
                                    </div>

                                @endforeach
                                @endif
                            </div>
                            @endforeach
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" value="添加用户信息" class="btn btn-primary btn-danger"/>&nbsp;
                            </div>
                        </div>
                    </div>

            </form>

            </div><!-- panel-body -->

            <!-- panel-footer -->

        </div><!-- panel -->



    </div><!-- contentpanel -->
    <script>
        $(".display-sub-permission-toggle").toggle(function () {
            $(this).children('span').removeClass('glyphicon-minus').addClass('glyphicon-plus')
                .parents('.top-permission').next('.sub-permissions').hide();
        }, function () {
            $(this).children('span').removeClass('glyphicon-plus').addClass('glyphicon-minus')
                .parents('.top-permission').next('.sub-permissions').show();
        });

        $(".top-permission-checkbox").change(function () {
            $(this).parents('.top-permission').next('.sub-permissions').find('input').prop('checked', $(this).prop('checked'));
        });

        $(".sub-permission-checkbox").change(function () {
            if ($(this).prop('checked')) {
                $(this).parents('.sub-permissions').prev('.top-permission').find('.top-permission-checkbox').prop('checked', true);
            }
        });
    </script>
    <script type="text/javascript">
        $("#save-role-permissions").click(function (e) {
            e.preventDefault();
            Rbac.ajax.request({
                href: $("#role-permissions-form").attr('action'),
                data: $("#role-permissions-form").serialize(),
                successTitle: '角色权限保存成功'
            });
        });
    </script>
@endsection