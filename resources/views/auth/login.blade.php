<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>
    
    
            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                @if (session('resultado') == 'N')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Informacion!</strong> Usuario no encontrado.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('resultado') == 'A')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Informacion!</strong> Usuario Autenticado.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('resultado') == 'F')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Informacion!</strong> Error Password.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <h3 class="display-4">Analsis Calidad</h3>
                                <p class="text-muted mb-4">Analisis de productos de Produccion</p>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="username" name="username" type="text" placeholder="Usuario" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="password" name="password" type="password" placeholder="Contrasenia" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Iniciar sesion</button>
                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p>&copy; 2024 MiEmpresa S.A de C.V.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->
    
                </div>
            </div><!-- End -->
    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    *
    */
    .login,
    .image {
      min-height: 100vh;
    }
    
    .bg-image {
      background-image: url('https://www.navvis.com/hubfs/navvis-factory-planning2-header.jpg');
      background-size: cover;
      background-position: center center;
    }
    </style>
    
</body>
</html>