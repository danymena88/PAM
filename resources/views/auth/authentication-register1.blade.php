<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Freedash Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.min.css'); }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row text-center">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(https://social.hays.com/wp-content/uploads/2019/08/Why-coding-is-the-new-%E2%80%98language%E2%80%99-of-the-world.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <img src="images/big/icon.png" alt="wrapkit">
                        <h2 class="mt-3 text-center">{{ session('sucursal')}}</h2>
                        <form class="mt-4" action="/register" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" placeholder="nombre de usuario..." name="name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="email" placeholder="Correo electrónico..." name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" placeholder="Contraseña..." name="password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Registrarse</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Ya posees una cuenta? <a href="http://127.0.0.1:8000/login" class="text-danger">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ URL::asset('js/jquery.min.js'); }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ URL::asset('js/popper.min.js'); }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js'); }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>