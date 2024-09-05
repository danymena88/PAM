<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1969px-Laravel.svg.png" alt="Bootstrap" width="30" height="24">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/linea_produccion/lista">Linea produccion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/producto/lista">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Parametros producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lote Produccion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Acceso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Analisis</a>
                        </li>
                    </ul>
                </div>
                @if (session('username') != null)
                    <form action="/logout" method="POST" class="d-flex" role="search">
                        @csrf
                        <span class="p-2">{{ session('username') }} [{{ session('rol') }}] </span>
                        <button class="btn btn-outline-success" type="submit">Logout</button>
                    </form>
                    
                @else
                    <script type="text/javascript">
                        window.location = "http://127.0.0.1:8000/";//here double curly bracket
                    </script>
                @endif
              
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="/linea_produccion/nuevo" role="button">Nuevo</a>
                </div>
                <div class="col-12">
                    @if (session('resultado') != null)
                        @if (session('resultado') == "Y")
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Informacion!</strong> Accion realizada correctamente.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>                           
                       
                        @else
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Informacion!</strong> Error al realizar la accion.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif                       
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                @if (session('rol') == "Administrador")
                                    <th scope="col">Acciones</th>                                    
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lineaProduccionList as $lineaProduccion)
                                <tr>
                                    <td> {{$lineaProduccion->nombre}} </td>
                                    <td> {{$lineaProduccion->isactive == 'Y' ? 'Activo' : 'Inactivo'}} </td>
                                    @if (session('rol') == "Administrador")
                                        <td>
                                            <a class="btn btn-danger" href="/linea_produccion/eliminar/{{ $lineaProduccion->idlinea_produccion }}" role="button">Eliminar</a>
                                            <a class="btn btn-warning" href="/linea_produccion/actualizar/{{ $lineaProduccion->idlinea_produccion }}" role="button">Actualizar</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>