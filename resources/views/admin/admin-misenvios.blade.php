@extends('plantilla')
@section('titulo', 'Grupos de Usuarios')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
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


                <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" id="envio_modal">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Envío</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center" id="nuevo-form">
                                <div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Sucursal</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Sucursal</p></div></div>
                                <form action="envio-aprob" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">Codigo</p><p class="m-0">Descripción del paquete...</p> 
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled></textarea></div>
                        <div class="modal-footer">
                            {{-- <button type="submit" class="enlace btn btn-danger">Aprobar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button> --}}
                        </div></form>
                            </div>
                        </div>
                    </div>
                </div>



                @if (session('resultado') == 'anulado')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Envío anulado!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif




            <script>
                function misEnvios(query) {
                    $.ajax({
                        url: "/admin/envio-anular-u",
                        type: "GET",
                        data:{'envio' : query},
                        success:function(data){
                            $('#envio_modal').html(data);
                        }
                    });
            };


            function anularEnvio(query) {
                    $.ajax({
                        url: "/admin/anular-envio",
                        type: "GET",
                        data:{'id' : query},
                        success:function(data){
                            $('#envio_modal').html(data);
                        }
                    });
            };
            </script>

                


                
            
@endsection
