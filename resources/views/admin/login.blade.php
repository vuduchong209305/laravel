<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <base href="{{ asset('') }}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="public/admin/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="public/admin/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="public/admin/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="public/admin/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="public/admin/css/blue.css">

        <link rel="stylesheet" href="public/admin/css/custom.css">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b>LTE</a>
            </div>
            
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ url('admin/login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    @include('blocks.error')

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                    
                </form>

                

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                    Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                    Google+</a>
                </div>
                <!-- /.social-auth-links -->
                <a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="public/admin/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="public/admin/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="public/admin/js/icheck.min.js"></script>
        <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
              });
            });
        </script>
    </body>
</html>