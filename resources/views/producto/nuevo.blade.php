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
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="idlinea_produccion" class="form-label">Linea Produccion</label>
                            <select name="idlinea_produccion" class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar</option>
                                @foreach ($lineaProduccionList as $linea_produccion)
                                    <option value="{{ $linea_produccion->idlinea_produccion }}"> {{ $linea_produccion->nombre }}</option>
                                    
                                @endforeach
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Codigo producto</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="isactive" name="isactive">
                            <label class="form-check-label" for="isactive">Activo</label>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a class="btn btn-primary" href="lista" role="button">Regresar</a>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>