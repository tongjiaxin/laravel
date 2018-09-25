@extends('Sy.admin-app')
@section("title","添加权限角色分配")
@section("content")
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="contentpanel">

        <div class="row">

            <div class="col-sm-9 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="panel-close">×</a>
                            <a href="" class="minimize">−</a>
                        </div>
                        <h4 class="panel-title">编辑[角色]权限</h4>
                    </div>

                    <form action="" method="post" id="role-permissions-form">
                        <div class="panel-body panel-body-nopadding">
                            @foreach($users as $v)
                            <div class="top-permission col-md-12">
                                <a href="javascript:;" class="display-sub-permission-toggle">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                                <input type="checkbox" name="permissions[]" value="11"
                                       class="top-permission-checkbox"/>
                                <label><h5>{{$v['name']}}</h5></label>
                            </div>
                                @if(isset($v['son']))
                                    <div class="sub-permissions col-md-11 col-md-offset-1">
                                    @foreach($v['son'] as $a)

                                        <div class="col-sm-3">
                                            <label><input type="checkbox" name="permissions[]"
                                                          value=""
                                                          class="sub-permission-checkbox" />&nbsp;&nbsp;<span
                                                        class="fa fa-bars"></span>{{$a['name']}}
                                            </label>
                                            {{--<label><input type="checkbox" name="permissions[]"
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
                                    <button class="btn btn-primary" id="save-role-permissions">保存</button>
                                </div>
                            </div>
                        </div><!-- panel-footer -->

                    </form>

                </div>

            </div>
        </div>
    </div>


@endsection