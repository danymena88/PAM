@extends('plantilla')
@section('titulo', 'Grupos de Usuarios')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (count($envios) > 0)
                            <div class="card-body mt-3">
                                <div class="w-100 d-flex flex-row justify-content-between align-items-center pb-4"><h4 class="card-title mb-4" style="margin-bottom:0px!important;">Envíos Salientes</h4><input type="search" class="form-control" placeholder="#código" id="codSaliente" style="width: 200px;"></div>
                                <div class="row">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Remitente</th>
                                                <th>Destinatario</th>
                                                <th>Sucursal</th>
                                                <th>Fecha de envío</th>
                                                <th>Gestión</th>
                                            </tr>
                                        </thead>
                                        <tbody id="salientes">
                                            @foreach ($envios as $key=>$envio)
                                            <tr>
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    <?php $name = App\Models\User::nombreApellido($envio->idDestinatario);
                                                    $sucursal = App\Models\Sucursal::sucursalDestinatario($envio->sucDestinatario);
                                                    $nombre = $envio->primerNombre.' '.$envio->primerApellido
                                                    ?>
                                                    {{$nombre}}
                                                </td>
                                                <td>
                                                    {{$name}}
                                                </td>
                                                <td>
                                                    {{$sucursal}}
                                                </td>
                                                <td>
                                                    {{date_format(date_create($envio->created_at), "d/m/Y")}}
                                                </td>
                                                <td>
                                                    <a onclick="gestSaliente({{$envio->id}},{{$envio->idDestinatario}});" id="envio" class="btn badge rounded-pill btn-dark" style="padding:0.5rem" data-bs-toggle="modal" data-bs-target="#ventanaModal">{{$envio->codigo}}</a>
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
                            <div class="d-flex flex-row"><i data-feather="send" class="feather-icon me-2"></i><p>No hay envíos salientes...</p></div>
                        </div>
                        @endif
                    </div>
                </div></div>



                <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" id="envio_modal">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Aprobar el envío del paquete...</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center" id="nuevo-form">
                                <div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p></div></div>
                                <form action="envio-aprob" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">Codigo</p><p class="m-0">Descripción del paquete...</p> 
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled></textarea></div>
                        <div class="modal-footer">
                            <button type="submit" class="enlace btn btn-danger">Aprobar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Anular</button>
                        </div></form>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (count($enviosEnt) > 0)
                            <div class="card-body mt-3">
                                <div class="w-100 d-flex flex-row justify-content-between align-items-center pb-4"><h4 class="card-title mb-4" style="margin-bottom:0px!important;">Envíos Entrantes</h4><input type="search" class="form-control" placeholder="#código" id="codEntrante" style="width:200px;"></div>
                                <div class="row">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Destinatario</th>
                                                <th>Remitente</th>
                                                <th>Sucursal</th>
                                                <th>Fecha de envío</th>
                                                <th>Gestión</th>
                                            </tr>
                                        </thead>
                                        <tbody id="entrantes">
                                            @foreach ($enviosEnt as $key=>$envioE)
                                            <tr>
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    {{$envioE->primerNombre}} {{$envioE->primerApellido}}
                                                </td>
                                                <td>
                                                    <?php $nameR = App\Models\User::nombreApellido($envioE->idRemitente);
                                                    $sucursalR = App\Models\Sucursal::sucursalDestinatario($envioE->sucRemitente); ?>
                                                    {{ $nameR }}
                                                </td>
                                                <td>
                                                    {{$sucursalR}}
                                                </td>
                                                <td>
                                                    {{date_format(date_create($envioE->created_at), "d/m/Y")}}
                                                </td>
                                                <td>
                                                    <a onclick="gestEntrante({{$envioE->id}},{{$envioE->idDestinatario}});" id="envio2" class="btn badge rounded-pill btn-dark" style="padding:0.5rem" data-bs-toggle="modal" data-bs-target="#ventanaModal2">{{$envioE->codigo}}</a>
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
                            <div class="d-flex flex-row"><i data-feather="send" class="feather-icon me-2"></i><p>No hay envíos entrantes...</p></div>
                        </div>
                        @endif
                    </div>
                </div></div>



                <div class="modal fade" id="ventanaModal2" tabindex="-1" aria-labelledby="ventanaModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" id="envio_modal">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Aprobar el envío del paquete...</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center" id="nuevo-form2">
                                <div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-left-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p></div></div>
                                <form action="envio-aprobent" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">Codigo</p><p class="m-0">Descripción del paquete...</p> 
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled></textarea></div>
                        <div class="modal-footer">
                            <button type="submit" class="enlace btn btn-danger">Enviar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        </div></form>
                            </div>
                        </div>
                    </div>
                </div>




                <script type="text/javascript">
                $(document).ready(function(){
                        $('#codSaliente').on('keyup', function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "/admin/search-saliente",
                                type: "GET",
                                data:{'query' : query},
                                success:function(data){
                                    $('#salientes').html(data);
                                }
                            });
                        });
                        $('#codEntrante').on('keyup', function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "/admin/search-entrante",
                                type: "GET",
                                data:{'query' : query},
                                success:function(data){
                                    $('#entrantes').html(data);
                                }
                            });
                        });
                    });



                function gestSaliente(query,de) {
                    $.ajax({
                        url: "/admin/get-descripcion",
                        type: "GET",
                        data:{'id' : query, 'de' : de},
                        success:function(data){
                            $('#nuevo-form').html(data);
                        }
                    });
                };


                function getAnular(query) {
                    $.ajax({
                        url: "/admin/get-anular",
                        type: "GET",
                        data:{'id' : query},
                        success:function(data){
                            $('#nuevo-form').html(data);
                        }
                    });
                };


                function gestEntrante(query,de) {
                    $.ajax({
                        url: "get-entrante",
                        type: "GET",
                        data:{'id' : query, 'de' : de},
                        success:function(data){
                            $('#nuevo-form2').html(data);
                        }
                    });
                };
                </script>
                


                
            
@endsection
