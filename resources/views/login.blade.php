<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- My Css -->
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Welcome {{ Session::get('username') }}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>
                @if (Session::get('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @endif
                <form action="login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append border-left">
                            <div class="input-group-text">
                                <span class="mw-icon fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control border-right" placeholder="Username" name="username"
                            required>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append border-left">
                            <div class="input-group-text">
                                <span toggle="#password-field" class="mw-icon fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <input type="password" id="password-field" class="form-control border-right password" placeholder="Password"
                            name="password" required>
                        


                        
                    </div>
                    <div class="row">
                        {{-- <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block bg-color" name="login"
                                value="Login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
                <p class="mb-0">
                    <a href="register" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- JQuery Validator -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <!-- My Script JS -->
    <script src={{ asset('js/myjs.js') }}></script>

</body>

</html>
