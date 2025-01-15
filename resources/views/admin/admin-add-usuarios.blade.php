@extends('plantilla')
@section('titulo', 'Agregar Usuarios')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-dark text-center">
                                                <h1 class="font-light text-white">{{$totales}}</h1>
                                                <h6 class="text-white">Total de Usuarios</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 text-center" style="background-color: #c00303;">
                                                <h1 class="font-light text-white">{{$admins}}</h1>
                                                <h6 class="text-white">Administradores</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-secondary text-center">
                                                <h1 class="font-light text-white">{{$estats}}</h1>
                                                <h6 class="text-white">Usuarios con Estadísticas</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4 class="card-title">Crear Usuario</h4>
                                <form action="adduser" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group mb-3 mt-4 row">
                                            <label class="col-md-2">Datos Generales</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" required placeholder="Primer Nombre" name="primerNombre">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Tercer Nombre" name="tercerNombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Segundo Nombre" name="segundoNombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" required placeholder="Primer Apellido" name="primerApellido">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Apellido de Casada" name="apellidoCasada">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Segundo Apellido" name="segundoApellido">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">   
                                                <div class="col-sm-12 col-md-3">                                                        
                                                    <p>Género</p>
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input type="radio" name="genero" value="M" checked="">Masculino</label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input type="radio" name="genero" value="F">Femenino</label>
                                                    </fieldset> 
                                                </div>
                                                <div class="col-sm-12 col-md-5">
                                                            <p>Correo Electrónico</p>
                                                                <div class="form-group">
                                                                    <input type="email" required class="form-control" placeholder="abc@example.com" name="email">
                                                                </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <p>Contraseña</p>
                                                        <div class="form-group">
                                                            <input type="text" required class="form-control" placeholder="Contraseña" name="password">
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
                                                                            <option selected="">Selecciona</option>
                                                                            @foreach ($gruposDeUsuarios as $grupo)
                                                                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                                                            @endforeach
                                                                          </select>
                                                                    </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Puesto de Trabajo</p>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Ej.: Asistente de Gerencia" name="cargo">
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Sucursal</p>
                                                            <div class="form-group mb-4">
                                                                <select class="form-select mr-sm-2" name="id_sucursal">
                                                                    <option selected="">Selecciona</option>
                                                                    @foreach ($sucursales as $sucursal)
                                                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombreSucursal }}</option>
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
                                            <button type="submit" class="btn btn-danger">Crear</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
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
                                    @foreach ($sucursales as $sucursal)
                                    @if ($sucursal->id == 1)
                                    <label class="btn btn-dark me-3 mb-3 rounded-pill">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="radio" checked class="custom-control-input" name="radiobutton" value="{{ $sucursal->id }}">
                                            <label class="custom-control-label" for="checkbox0">{{ $sucursal->nombreSucursal }}</label>
                                        </div>
                                    </label>
                                    @else
                                    <label class="btn btn-dark me-3 mb-3 rounded-pill">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="radio" class="custom-control-input" name="radiobutton" value="{{ $sucursal->id }}">
                                            <label class="custom-control-label" for="checkbox0">{{ $sucursal->nombreSucursal }}</label>
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
                                                <th>Grupo</th>
                                                <th>Puesto</th>
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
                                                    {{App\Models\GruposUsuarios::nombreDelGrupo($usuario->id_rol_usuarios)}}
                                                </td>
                                                <td>
                                                    {{ $usuario->cargo }}
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




                @if (session('resultado') == 'S')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Nuevo usuario agregado!
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
                        $("input[name='radiobutton']").click(function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "search",
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
                            url: "search",
                            type: "GET",
                            data:{'page' : page, 'search' : num},
                            success:function(data){
                                $('#search_list').html(data);
                            }
                        })
                    
                    }
                    </script>
@endsection
