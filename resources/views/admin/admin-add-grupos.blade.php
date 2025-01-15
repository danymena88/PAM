@extends('plantilla')
@section('titulo', 'Grupos de Usuarios')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="card-title">Nuevo Grupo</h4>
                                    <form action="addgrupo" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group mb-3 mt-4 row">
                                                <label class="col-md-2">Nombre del grupo</label>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <input type="text" class="form-control" required placeholder="nombre" name="nombre">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group mb-3">
                                                                <input type="text" class="form-control" required placeholder="descripción" name="descripcion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 mt-5 row">
                                                <label class="col-md-2">Privilegios</label>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="envios">
                                                                        <label class="custom-control-label" for="checkbox0">Hacer envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="modenvios">
                                                                        <label class="custom-control-label" for="checkbox1">Modificar envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="usuarios">
                                                                        <label class="custom-control-label" for="checkbox2">Crear usuarios</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-7 mb-3">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="statglobales">
                                                                        <label class="custom-control-label" for="checkbox1">Ver estadísticas globales</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="modusuarios">
                                                                        <label class="custom-control-label" for="checkbox2">Modificar usuarios</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="paqsucursal">
                                                                        <label class="custom-control-label" for="checkbox2">Gestionar paquetes de su sucursal</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-danger">Crear</button>
                                                <button type="reset" class="btn btn-dark">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>hacer envíos?</th>
                                                <th>modificar envios?</th>
                                                <th>crear usuarios?</th>
                                                <th>modificar usuarios?</th>
                                                <th>estadísticas globales?</th>
                                                <th>gestión paquetes?</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gruposDeUsuarios as $grupo)
                                            <tr>
                                                <td>
                                                    @if ($grupo->id > 4)
                                                    <a class="fs-6" href="/admin/modificar-grupo/{{ $grupo->id }}">{{ $grupo->nombre; }}</a>
                                                    @else
                                                    <span class="fs-6">{{ $grupo->nombre; }}</span>
                                                    @endif
                                                </td>
                                                <td>@if ($grupo->hacerEnvios == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                                <td>@if ($grupo->modificarPaquetes == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                                <td>@if ($grupo->crearUsuarios == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                                <td>@if ($grupo->modificarUsuarios == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                                <td>@if ($grupo->verEstadisticasGlobales == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                                <td>@if ($grupo->gestionarPaquetes == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                                <td>
                                                @if ($grupo->id > 4)
                                                    <a class="boton btn btn-dark" data-bs-toggle="modal" data-bs-target="#ventanaModal" data-info="{{ $grupo->id; }}">Eliminar</a>
                                                    @else
                                                    <a class="boton btn btn-secondary" disabled>Eliminar</a>
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Ventana Modal -->
<div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Atención !!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
            <p class="text-dark fs-4">¿¿Está seguro que desea eliminar este grupo de usuarios??</p>
            <p><small>Los usuarios que posean el grupo que está a punto de eliminar pasarán a formar parte del grupo </small>Usuario Básico.</p>
            </div>
            <div class="modal-footer">
                <a class="enlace btn btn-danger">Eliminar</a>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
                            </div>
                        </div>
                    </div>
                </div></div>


                <div class="row" id="mod">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Modificar Grupo</h4>
                                @if ($modmod == true)
                                <div class="row">
                                    <form action="updategrupo" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group mb-3 mt-4 row">
                                                <label class="col-md-2">Nombre del grupo</label>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <input type="text" class="form-control" value="{{ $modGrupo->nombre }}" required placeholder="nombre" name="nombre">
                                                                <input type="hidden" name="id" value="{{ $modGrupo->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group mb-3">
                                                                <input type="text" class="form-control" value="{{ $modGrupo->descripcion }}" required placeholder="descripción" name="descripcion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 mt-5 row">
                                                <label class="col-md-2">Privilegios</label>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        @if ($modGrupo->hacerEnvios == 'Y')
                                                                        <input type="checkbox" class="custom-control-input" name="envios" checked>
                                                                        @else
                                                                        <input type="checkbox" class="custom-control-input" name="envios">
                                                                        @endif
                                                                        <label class="custom-control-label" for="checkbox0">Hacer envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        @if ($modGrupo->modificarPaquetes == 'Y')
                                                                        <input type="checkbox" class="custom-control-input" name="modenvios" checked>
                                                                        @else
                                                                        <input type="checkbox" class="custom-control-input" name="modenvios">
                                                                        @endif
                                                                        <label class="custom-control-label" for="checkbox1">Modificar envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        @if ($modGrupo->crearUsuarios == 'Y')
                                                                        <input type="checkbox" class="custom-control-input" name="usuarios" checked>
                                                                        @else
                                                                        <input type="checkbox" class="custom-control-input" name="usuarios">
                                                                        @endif
                                                                        <label class="custom-control-label" for="checkbox2">Crear usuarios</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-7 mb-3">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        @if ($modGrupo->verEstadisticasGlobales == 'Y')
                                                                        <input type="checkbox" class="custom-control-input" name="statglobales" checked>
                                                                        @else
                                                                        <input type="checkbox" class="custom-control-input" name="statglobales">
                                                                        @endif
                                                                        <label class="custom-control-label" for="checkbox1">Ver estadísticas globales</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        @if ($modGrupo->modificarUsuarios == 'Y')
                                                                        <input type="checkbox" class="custom-control-input" name="modusuarios" checked>
                                                                        @else
                                                                        <input type="checkbox" class="custom-control-input" name="modusuarios">
                                                                        @endif
                                                                        <label class="custom-control-label" for="checkbox2">Modificar usuarios</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        @if ($modGrupo->gestionarPaquetes == 'Y')
                                                                        <input type="checkbox" class="custom-control-input" name="paqsucursal" checked>
                                                                        @else
                                                                        <input type="checkbox" class="custom-control-input" name="paqsucursal">
                                                                        @endif
                                                                        <label class="custom-control-label" for="checkbox2">Gestionar paquetes de su sucursal</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-danger">Modificar</button>
                                                <a class="btn btn-dark" href="/admin/grupos">Cancelar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <div class="row">
                                    <form action="addgrupo" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group mb-3 mt-4 row">
                                                <label class="col-md-2">Modificar grupo</label>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <input type="text" disabled class="form-control" required placeholder="nombre" name="nombre">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group mb-3">
                                                                <input type="text" disabled class="form-control" required placeholder="descripción" name="descripcion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 mt-5 row">
                                                <label class="col-md-2">Privilegios</label>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" disabled class="custom-control-input" name="envios">
                                                                        <label class="custom-control-label" for="checkbox0">Hacer envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" disabled class="custom-control-input" name="modenvios">
                                                                        <label class="custom-control-label" for="checkbox1">Modificar envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" disabled class="custom-control-input" name="usuarios">
                                                                        <label class="custom-control-label" for="checkbox2">Crear usuarios</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-7 mb-3">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" disabled class="custom-control-input" name="statglobales">
                                                                        <label class="custom-control-label" for="checkbox1">Ver estadísticas globales</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2 rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" disabled class="custom-control-input" name="modusuarios">
                                                                        <label class="custom-control-label" for="checkbox2">Modificar usuarios</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark rounded-pill">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" disabled class="custom-control-input" name="paqsucursal">
                                                                        <label class="custom-control-label" for="checkbox2">Gestionar paquetes de su sucursal</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" id="myForm">
                                <div style="display:flex; flex-direction: row; flex-wrap: wrap;">
                                    @foreach ($gruposDeUsuarios as $grupo)
                                    @if ($grupo->id == 1)
                                    <label class="btn btn-dark me-3 mb-3 rounded-pill">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="radio" checked class="custom-control-input" name="radiobutton" value="{{ $grupo->id }}">
                                            <label class="custom-control-label" for="checkbox0">{{ $grupo->nombre }}</label>
                                        </div>
                                    </label>
                                    @else
                                    <label class="btn btn-dark me-3 mb-3 rounded-pill">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="radio" class="custom-control-input" name="radiobutton" value="{{ $grupo->id }}">
                                            <label class="custom-control-label" for="checkbox0">{{ $grupo->nombre }}</label>
                                        </div>
                                    </label>
                                    @endif
                                    @endforeach
                                </div>
                            </form>
                                <div class="row">
                                <div class="table-responsive" id="search_list">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Género</th>
                                                <th>Email</th>
                                                <th>Puesto</th>
                                                <th>Sucursal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listaUsuarios as $key=>$usuario)
                                            <tr>
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    @if ($usuario->apellidoCasada != '')
                                                    {{$usuario->primerNombre}} {{$usuario->segundoNombre}} {{$usuario->primerApellido}} {{$usuario->apellidoCasada}}
                                                    @else
                                                    {{$usuario->primerNombre}} {{$usuario->segundoNombre}} {{$usuario->primerApellido}} {{$usuario->segundoApellido}}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$usuario->genero}}
                                                </td>
                                                <td>
                                                    {{$usuario->email}}
                                                </td>
                                                <td>
                                                    {{ $usuario->cargo }}
                                                </td>
                                                <td>
                                                    {{ App\Models\Sucursal::nombreDeSucursal($usuario->id_sucursal) }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination" style="display:flex;flex-direction:row;justify-content:center;">{{$listaUsuarios->links()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>







                <script type="text/javascript">
                $(document).ready(function () {
                    $(".boton").click(function () {
                        let info = $(this).data('info');
                        $('.enlace').attr('href', "/admin/eliminar-grupo/" + info);
                    });
                });



                $(document).ready(function(){
                        $("input[name='radiobutton']").click(function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "search-g",
                               type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                          });
                        });
                    });

                    $(document).on('click', '.pagination a', function(e){
                        e.preventDefault();
                        let page = $(this).attr('href').split('page=')[1];
                        product(page);
                    })

                    function product(page){
                        var num = $('input[name=radiobutton]:checked', '#myForm').val();
                        $.ajax({
                            url: "search-g",
                            type: "GET",
                            data:{'page' : page, 'search' : num},
                            success:function(data){
                                $('#search_list').html(data);
                            }
                        })
                    
                    }
                </script>
            @if (session('resultado') == 'S')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Nuevo grupo agregado!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif
                @if (session('resultado') == 'Z')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    El grupo se modificó con éxito!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif
                @if (session('resultado') == 'X')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    El campo nombre no puede estar vacío!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif
                @if (session('resultado') == 'B')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Grupo eliminado con éxito!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif
                @if (session('resultado') == 'N')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Grupos base no pueden ser eliminados!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif
            
@endsection
