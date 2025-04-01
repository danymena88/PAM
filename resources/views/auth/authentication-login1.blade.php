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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.svg">
    <title>Login</title>
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
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(images/coding-vs-programming.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{ URL::asset('images/logo.png'); }}" class="img-fluid" style="max-width:180px;">
                        </div>
                        <p class="text-center">Ingresa tu usuario y contraseña.</p>
                        <form class="mt-4" action="/login" method="POST">
                            @csrf
                            <div class="row">
                                @if (session('resultado') == 'incorrecta')
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Email</label>
                                        <input class="form-control" id="uname" type="text" name="email"
                                            placeholder="ingresa tu correo...">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Contraseña</label>
                                        <input class="form-control is-invalid" id="pwd" type="password" name="password"
                                            placeholder="ingresa tu contraseña...">
                                            <div class="invalid-feedback">
                                                Contraseña incorrecta, inténtalo de nuevo... 
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Ingresar</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Aún no tienes cuenta? <a href="http://127.0.0.1:8000/register" class="text-danger">Regístrate</a>
                                </div>
                                @elseif (session('resultado') == 'noEncontrado')
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Email</label>
                                        <input class="form-control is-invalid" id="uname" type="text" name="email"
                                            placeholder="ingresa tu correo...">
                                            <div class="invalid-feedback">
                                                Usuario no encontrado, inténtalo de nuevo... 
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Contraseña</label>
                                        <input class="form-control" id="pwd" type="password" name="password"
                                            placeholder="ingresa tu contraseña...">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Ingresar</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Aún no tienes cuenta? <a href="http://127.0.0.1:8000/register" class="text-danger">Regístrate</a>
                                </div>
                                @elseif (session('resultado') == 'completeCampos')
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Email</label>
                                        <input class="form-control is-invalid" id="uname" type="text" name="email"
                                            placeholder="ingresa tu correo...">
                                            <div class="invalid-feedback">
                                                Debes ingresar tu correo... 
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Contraseña</label>
                                        <input class="form-control is-invalid" id="pwd" type="password" name="password"
                                            placeholder="ingresa tu contraseña...">
                                            <div class="invalid-feedback">
                                                Debes ingresar tu contraseña...
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Ingresar</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Aún no tienes cuenta? <a href="http://127.0.0.1:8000/register" class="text-danger">Regístrate</a>
                                </div>
                                @else
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Email</label>
                                        <input class="form-control" id="uname" type="text" name="email"
                                            placeholder="ingresa tu correo...">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Contraseña</label>
                                        <input class="form-control" id="pwd" type="password" name="password"
                                            placeholder="ingresa tu contraseña...">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn w-100 btn-dark">Ingresar</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Aún no tienes cuenta? <a href="http://127.0.0.1:8000/register" class="text-danger">Regístrate</a>
                                </div>
                                @endif
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