@extends('Sy/admin-app')
@section("title","小说内容表")
@section("content")

    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 小说内容 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="index.html">Bracket</a></li>
                <li><a href="general-forms.html">Forms</a></li>
                <li class="active">General Forms</li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th style="text-align: center;">
                            内容
                        </th>
                    </tr>
                    </thead>
                    @foreach($user as $v)
                        <tbody>
                            <tr  style="text-align: center;">
                                <td style="">
                                    <p style="width: 400px;margin-left: 430px;">{{$v->content}}</p>
                                </td>
                            </tr>
                        </tbody>


                </table>
                <a class="btn btn-xs btn-primary" href="/Film/read?id={{$v->Novel_id}}" style="margin-left: 1200px; width: 70px;height: 30px;">回到目录</a>
                @endforeach
            </div><!-- table-responsive -->
        </div>
    </div>

@endsection