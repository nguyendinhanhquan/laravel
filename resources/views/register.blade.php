<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- My Css -->
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/mycss.css">
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
            <a href="/"><b>Welcome</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Register</p>
                @if (Session::get('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @endif

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach

                <form onblur="checkFormRegister()" id="register" action="register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append border-left">
                            <div class="input-group-text">
                                <span class="fas fa-user mw-icon"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control border-right" placeholder="Username" id="username"
                            name="username">

                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-append border-left">
                            <div class="input-group-text">
                                <span class="fas fa-at mw-icon"></span>
                            </div>
                        </div>
                        <input type="email" class="form-control border-right" placeholder="Email" name="email" required>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append border-left">
                            <div class="input-group-text">
                                <span toggle="#password" class="mw-icon fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control border-right" placeholder="Password" id="password"
                            name="password" required>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append border-left">
                            <div class="input-group-text">
                                <span toggle="#confirm_password" class="mw-icon fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control border-right" placeholder="Confirm password"
                            id="confirm_password" name="password2" required>

                    </div>
                    <p class="text-info" style="font-size: 16px">Password minimum 7 character, at least one uppercase
                        letter, one number and one special character</p>
                    <div class="row">

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block bg-color" name="login"
                                value="Login">Registration</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
                <p class="mb-0">
                    <a href="login" class="text-center">I have account</a>
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
