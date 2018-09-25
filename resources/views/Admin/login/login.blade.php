<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/js/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">

    <title>后台管理系统--登陆</title>

    <link href="/css/style.default.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="signin">
<section>

    <div class="signinpanel">

        <div class="row">

            <div class="col-md-7">

                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span> 后台管理系统--登陆 <span>]</span></h1>
                    </div><!-- logopanel -->

                    <div class="mb20"></div>

                    <p>
                        <img src="/images/admin-icon.png" width="300">
                    </p>
                </div><!-- signin0-info -->

            </div><!-- col-sm-7 -->

            <div class="col-md-5">
                <form enctype="multipart/form-data" method="post" action="/admin/dologin">
                    {{csrf_field()}}
                    <h4 class="nomargin">登录</h4>
                    <p class="mt5 mb20"></p>

                    <input type="text" class="form-control username" placeholder="账户" name="username" />
                    <p class="name" style="color: red;">
                        @if(session('msg'))
                            {{session('msg')}}
                            @endif
                    </p>
                    <input type="password" class="form-control password" placeholder="密码" name="password" />
                    <p class="pwd" style="color: red;">
                        @if(session('mng'))
                            {{session('mng')}}
                        @endif
                    </p>
                    <a href=""><small>Forgot Your Password?</small></a>
                    <p id="error" style="color: red;"></p>
                    <button class=" btn btn-success btn-block login" id="login">立即登录</button>
                </form>
            </div><!-- col-sm-5 -->

        </div><!-- row -->

        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. Bracket Bootstrap 3 Admin Template
            </div>
        </div>

    </div><!-- signin -->

</section>
<script>
    $(".login").click(function(){
        var username = $(".username").val();
        var password = $(".password").val();
        if(username == ''){
            $("#error").text('用户名不能为空');
            return false;
        }
        if(password == ''){
            $("#error").text('密码不能为空');
            return false;
        }
        if(username.length < 3){
            $("#error").text('用户名长度不能小于3！');
            return false;
        }
        if(password.length < 6){
            $("#error").text('密码长度不能小于6！');
            return false;
        }

    })
</script>

</body>
</html>
