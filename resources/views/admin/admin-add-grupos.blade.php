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
                                                                <label class="btn btn-dark mb-2">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="envios">
                                                                        <label class="custom-control-label" for="checkbox0">Hacer envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="modenvios">
                                                                        <label class="custom-control-label" for="checkbox1">Modificar envíos</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="usuarios">
                                                                        <label class="custom-control-label" for="checkbox2">Crear usuarios</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="modusuarios">
                                                                        <label class="custom-control-label" for="checkbox2">Modificar usuarios</label>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-7 mb-3">
                                                            <div class="btn-group d-flex flex-column w-75 align-items-center" data-bs-toggle="buttons">
                                                                <label class="btn btn-dark mb-2">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="statsucursales">
                                                                        <label class="custom-control-label" for="checkbox0">Ver estadísticas de su sucursal</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="statglobales">
                                                                        <label class="custom-control-label" for="checkbox1">Ver estadísticas globales</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark mb-2">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="paqsucursal">
                                                                        <label class="custom-control-label" for="checkbox2">Gestionar paquetes de su sucursal</label>
                                                                    </div>
                                                                </label>
                                                                <label class="btn btn-dark">
                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                        <input type="checkbox" class="custom-control-input" name="paqglobales">
                                                                        <label class="custom-control-label" for="checkbox2">Gestion de paquetes globales</label>
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
                                                <th>estadísticas de sucursal?</th>
                                                <th>estadísticas globales?</th>
                                                <th>gestión paquetes?</th>
                                                <th>gestión paquetes globales?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gruposDeUsuarios as $grupo)
                                            <tr>
                                                <td>
                                                    @if ($grupo->id > 4)
                                                    <a href="eliminar-grupo/{{ $grupo->id; }}" class="fs-6">{{ $grupo->nombre; }}</a>
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
                                                <td>@if ($grupo->estadisticasDeSuSucursal == 'Y')
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
                                                <td>@if ($grupo->gestionarPaquetesGlobales == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                @endif</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4 class="card-title">Agregar Usuario</h4>
                                <form action="admin/adduser" method="POST">
                                    <div class="form-body">
                                        <div class="form-group mb-3 mt-4 row">
                                            <label class="col-md-2">Datos Generales</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" required placeholder="Primer Nombre">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Tercer Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Segundo Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" required placeholder="Primer Apellido">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Apellido de Casada">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Segundo Apellido">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">   
                                                <div class="col-sm-12 col-md-3">                                                        
                                                    <p>Género</p>
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input type="radio" name="radio" value="" checked="">Masculino</label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input type="radio" name="radio" value="">Femenino</label>
                                                    </fieldset> 
                                                </div>
                                                <div class="col-sm-12 col-md-5">
                                                            <p>Correo Electrónico</p>
                                                                <div class="form-group">
                                                                    <input type="email" required class="form-control" placeholder="abc@example.com">
                                                                </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <p>Contraseña</p>
                                                        <div class="form-group">
                                                            <input type="text" required class="form-control" placeholder="Contraseña">
                                                        </div>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 mt-5 row">
                                            <label class="col-md-2">Datos de Trabajo</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Puesto de Trabajo</p>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Ej.: Asistente de Gerencia">
                                                            </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
            @if (session('resultado') == 'S')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-white">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:brown"></i>
                    <strong class="me-auto">Package Manager</strong>
                    <small>hace un momento...</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-white">
                    Nuevo grupo agregado!
                    </div>
                </div>
                </div>
                @endif
            
@endsection
