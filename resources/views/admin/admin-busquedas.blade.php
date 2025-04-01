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
                                    <h4 class="card-title">Buscar Envios </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <form id="firstForm" class="d-flex align-items-center flex-column">
                                            <div class="btn btn-dark mb-2 w-100 rounded-pill">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="persona" value="0" checked>
                                                        <label class="custom-control-label" for="customControlValidation2">Destinatario</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn btn-dark mb-2 w-100 rounded-pill">
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="persona" value="1">
                                                    <label class="custom-control-label" for="customControlValidation3">Remitente</label>
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <form id="secondForm" class="d-flex align-items-center flex-column">
                                            <div class="btn btn-dark mb-2 w-100 rounded-pill">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation2" name="fecha" value="0" checked>
                                                        <label class="custom-control-label" for="customControlValidation2">Fecha</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn btn-dark mb-2 w-100 rounded-pill">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation3" name="fecha" value="1">
                                                        <label class="custom-control-label" for="customControlValidation3">Todos</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="card-title">Ingresa la fecha</h4>
                                            <div class="mt-4">
                                                <div class="form-group">
                                                    <input type="date" id="date-input" class="form-control">
                                                </div>
                                            </div>
                                    </div>
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
                                                <th class="border-0 font-14 font-weight-medium text-muted">Envío</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" style="background-color:#f9fbfd; height: 200px; text-align: center;"><i data-feather="search" class="feather-icon"></i>No hay resultados...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4 class="card-title mb-4">Resultados de la búsqueda</h4>
                                <div class="row">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Remitente</th>
                                                <th>Destinatario</th>
                                                <th>Sucursal</th>
                                                <th>Estado</th>
                                                <th>Fecha de envío</th>
                                                <th>Fecha Recibido</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultados">
                                            <tr>
                                                <td colspan="8">
                                                    <div class="w-100 d-flex flex-row justify-content-center align-items-center" style="height: 200px;">
                                                        <div class="d-flex flex-row"><i data-feather="send" class="feather-icon me-2"></i><p>Realiza una búsqueda...</p></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                    </div>
                </div></div>





                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (count($misEnvios) > 0)
                            <div class="card-body mt-3">
                                <h4 class="card-title mb-4">Envíos Realizados</h4>
                                <div class="row">
                                <div class="table-responsive" id="search_list">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Destinatario</th>
                                                <th>Sucursal</th>
                                                <th>Estado</th>
                                                <th>Fecha de envío</th>
                                                <th>Fecha Recibido</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($misEnvios as $key=>$envio)
                                            <tr>
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    {{$envio->primerNombre}} {{$envio->primerApellido}}
                                                </td>
                                                <td>
                                                    {{$envio->nombreSucursal}}
                                                </td>
                                                <td>
                                                    @if ($envio->aprobadoPamDestino == 'N' && $envio->aprobadoPamRemitente == 'N' && $envio->recibidoDestinatario == 'N' && $envio->anulado == 'N')
                                                    <span class="badge rounded-pill text-bg-warning">Enviado</span>
                                                    @elseif ($envio->aprobadoPamDestino == 'N' && $envio->aprobadoPamRemitente == 'N' && $envio->recibidoDestinatario == 'N' && $envio->anulado == 'Y')
                                                    <span class="badge rounded-pill text-bg-secondary">Anulado</span>
                                                    @elseif($envio->aprobadoPamDestino == 'N' && $envio->aprobadoPamRemitente == 'Y' && $envio->recibidoDestinatario == 'N')
                                                    <span class="badge rounded-pill text-bg-danger">En camino</span>
                                                    @elseif($envio->aprobadoPamDestino == 'Y' && $envio->aprobadoPamRemitente == 'Y'  && $envio->recibidoDestinatario == 'N')
                                                    <a class="btn btn-success btn-rounded" style="font-size: 12px; padding: 3px 7px;"><i class="fas fa-check" style="margin-right:5px;"></i> Listo!</a>
                                                    @else
                                                    <span class="badge rounded-pill text-bg-success">Recibido</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{date_format(date_create($envio->created_at), "d/m/Y")}}
                                                </td>
                                                @if($envio->fechaRecibido == Null)
                                                <td>
                                                    --
                                                </td>
                                                @else
                                                <td>
                                                    {{date_format(date_create($envio->fechaRecibido), "d/m/Y")}}
                                                </td>
                                                @endif
                                                <td>
                                                    <a onclick="misEnvios({{$envio->id}});" id="envio" class="btn badge rounded-pill btn-dark" style="padding:0.5rem" data-bs-toggle="modal" data-bs-target="#ventanaModal">{{$envio->codigo}}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination" style="display:flex;flex-direction:row;justify-content:center;"></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="w-100 d-flex flex-row justify-content-center align-items-center" style="height: 200px;">
                            <div class="d-flex flex-row"><i data-feather="send" class="feather-icon me-2"></i><p>No has realizado envíos...</p></div>
                        </div>
                        @endif
                    </div>
                </div></div>

 --}}

                <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" id="envio_modal">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Envío</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center" id="nuevo-form">
                                <div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Sucursal</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Sucursal</p></div></div>
                                <div><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">Codigo</p><p class="m-0">Descripción del paquete...</p> 
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled></textarea></div>
                        <div class="modal-footer">
                            {{-- <button type="submit" class="enlace btn btn-danger">Aprobar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button> --}}
                        </div></div>
                            </div>
                        </div>
                    </div>
                </div>




                @if (session('resultado') == 'noFecha')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Debe seleccionar una fecha!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif


                @if (session('resultado') == 'pam')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    La sucursal no tiene gestor de paquetes!!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif

                @if (session('resultado') == 'E')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Código erróneo!
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
                    Código ya fue utilizado!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif

                @if (session('resultado') == 'G')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    No hay códigos disponibles! Consulte con informática.
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
                                url: "/admin/search-busquedas",
                                type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                            });
                        });
                        $(document).on('click', '.pagination a', function(event){
                            event.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            var query = $('#search').val();
                            $.ajax({
                                url: "/admin/search-busquedas" + "?page=" + page,
                                type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                            });
                        });


                        $("input[name='fecha']").click(function(){
                            var value = $(this).val();
                            if (value == "0"){
                                $('#date-input').prop("disabled", false);
                            }
                            else if (value == "1"){
                                $('#date-input').prop("disabled", true);
                            }
                        });
                    });

                    function envios(id) {
                        var funcion = $('input[name=persona]:checked', '#firstForm').val();
                        var select = $('input[name=fecha]:checked', '#secondForm').val();
                        var date = formatDate(new Date($('#date-input').val()));
                        console.log(date);
                        $.ajax({
                                url: "/admin/search-resultados",
                                type: "GET",
                                data:{'funcion' : funcion, 'select' : select, 'date' : date, 'id' : id},
                                success:function(data){
                                    $('#resultados').html(data);
                                }
                            });
                        
                    }


                    function gestSaliente(query,de) {
                    $.ajax({
                        url: "/admin/get-descripcion2",
                        type: "GET",
                        data:{'id' : query, 'de' : de},
                        success:function(data){
                            $('#nuevo-form').html(data);
                        }
                    });
                };

                    function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + (d.getDate() + 1),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

                    function enviouser(query) {
                            $.ajax({
                                url: "/admin/envio-usuario",
                                type: "GET",
                                data:{'user' : query},
                                success:function(data){
                                    $('#envio_modal').html(data);
                                    console.log(data);
                                }
                            });
                    };
                    </script>                         
            
@endsection
