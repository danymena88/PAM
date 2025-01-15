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
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Buscar </h4>
                                </div>
                                <div class="form-group mb-3 mt-4 row">
                                    <label class="col-md-2">Búsqueda de usuarios: </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                    <div class="form-group mb-4">
                                                        <form>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="search" name="busqueda" placeholder="Buscar...">
                                                                <small id="name13" class="badge badge-default text-bg-danger form-text float-end">Nombres/Apellidos</small>
                                                            </div>
                                                        </form>
                                                    </div>
                                    </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="table-responsive" id="search_list">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Nombre/Email
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Cargo
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Sucursal</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="modify">
                                                <td colspan="4" style="background-color:#f9fbfd; height: 200px; text-align: center;"><i data-feather="search" class="feather-icon"></i>No hay resultados...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                @if($mod == true)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4 class="card-title">Modificar Usuario</h4>
                                <form action="modificadoUser" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group mb-3 mt-4 row">
                                            <label class="col-md-2">Datos Generales</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="{{ $usuario->primerNombre }}" required placeholder="Primer Nombre" name="primerNombre">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control"  value="{{ $usuario->tercerNombre }}" placeholder="Tercer Nombre" name="tercerNombre">
                                                            <input hidden name="iduser" value="{{ $usuario->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="{{ $usuario->segundoNombre }}" placeholder="Segundo Nombre" name="segundoNombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="{{ $usuario->primerApellido }}" required placeholder="Primer Apellido" name="primerApellido">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="{{ $usuario->apellidoCasada }}" placeholder="Apellido de Casada" name="apellidoCasada">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" value="{{ $usuario->segundoApellido }}" placeholder="Segundo Apellido" name="segundoApellido">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">   
                                                <div class="col-sm-12 col-md-3">                                                        
                                                    <p>Género</p>
                                                    @if($usuario->genero == 'M')
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input type="radio" name="genero" value="M" checked="">Masculino</label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input type="radio" name="genero" value="F">Femenino</label>
                                                    </fieldset>
                                                    @else
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input type="radio" name="genero" value="M">Masculino</label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input type="radio" name="genero" value="F" checked="">Femenino</label>
                                                    </fieldset>
                                                    @endif
                                                </div>
                                                <div class="col-sm-12 col-md-5">
                                                            <p>Correo Electrónico</p>
                                                                <div class="form-group">
                                                                    <input type="email" value="{{ $usuario->email }}" required class="form-control" placeholder="abc@example.com" name="email">
                                                                </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <p>Contraseña</p>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Contraseña" name="password">
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
                                                                <p>Grupo de Usuarios</p>
                                                                    <div class="form-group mb-4">
                                                                        <select class="form-select mr-sm-2" name="id_rol_usuarios">
                                                                            <option>Selecciona</option>
                                                                            @foreach ($gruposDeUsuarios as $grupo)
                                                                            @if($usuario->id_rol_usuarios == $grupo->id)
                                                                            <option selected="" value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                                                            @else
                                                                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                                                            @endif
                                                                            @endforeach
                                                                          </select>
                                                                    </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Puesto de Trabajo</p>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="{{ $usuario->cargo }}" placeholder="Ej.: Asistente de Gerencia" name="cargo">
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Sucursal</p>
                                                            <div class="form-group mb-4">
                                                                <select class="form-select mr-sm-2" name="id_sucursal">
                                                                    <option>Selecciona</option>
                                                                    @foreach ($sucursales as $sucursal)
                                                                    @if($usuario->id_sucursal == $sucursal->id)
                                                                    <option selected="" value="{{ $sucursal->id }}">{{ $sucursal->nombreSucursal }}</option>
                                                                    @else
                                                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombreSucursal }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                  </select>
                                                            </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-danger">Modificar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4 class="card-title">Modificar Usuario</h4>
                                <form>
                                    <div class="form-body">
                                        <div class="form-group mb-3 mt-4 row">
                                            <label class="col-md-2">Datos Generales</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input disabled type="text" class="form-control" required placeholder="Primer Nombre" name="primerNombre">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input disabled type="text" class="form-control" placeholder="Tercer Nombre" name="tercerNombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input disabled type="text" class="form-control" placeholder="Segundo Nombre" name="segundoNombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input disabled type="text" class="form-control" required placeholder="Primer Apellido" name="primerApellido">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input disabled type="text" class="form-control" placeholder="Apellido de Casada" name="apellidoCasada">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input disabled type="text" class="form-control" placeholder="Segundo Apellido" name="segundoApellido">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">   
                                                <div class="col-sm-12 col-md-3">                                                        
                                                    <p>Género</p>
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input disabled type="radio" name="genero" value="M" checked="">Masculino</label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input disabled type="radio" name="genero" value="F">Femenino</label>
                                                    </fieldset> 
                                                </div>
                                                <div class="col-sm-12 col-md-5">
                                                            <p>Correo Electrónico</p>
                                                                <div class="form-group">
                                                                    <input disabled type="email" required class="form-control" placeholder="abc@example.com" name="email">
                                                                </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <p>Contraseña</p>
                                                        <div class="form-group">
                                                            <input disabled type="text" required class="form-control" placeholder="Contraseña" name="password">
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
                                                                <p>Grupo de Usuarios</p>
                                                                    <div class="form-group mb-4">
                                                                        <select class="form-select mr-sm-2" name="id_rol_usuarios" disabled>
                                                                            <option selected="">Selecciona</option>
                                                                          </select>
                                                                    </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Puesto de Trabajo</p>
                                                            <div class="form-group">
                                                                <input disabled type="text" class="form-control" placeholder="Ej.: Asistente de Gerencia" name="cargo">
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Sucursal</p>
                                                            <div class="form-group mb-4">
                                                                <select class="form-select mr-sm-2" name="id_sucursal" disabled>
                                                                    <option selected="">Selecciona</option>
                                                                  </select>
                                                            </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                @if (session('resultado') == 'S')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Usuario modificado con éxito!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif

                @if (session('resultado') == 'ya existe')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    El email ya existe! Elija otro...
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif



                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#search').on('keyup', function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "/admin/search-user",
                                type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                            });
                        });
                    });


                    $(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var query = $('#search').val();
                            $.ajax({
                                url: url,
                                type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                            });
    });

});


                    </script>


                
            
@endsection
