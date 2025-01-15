@extends('plantilla')
@section('titulo', 'Admin Dashboard')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">{{ count($enviosEnProceso) }}</h2>
                                             </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Envios en camino
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        @if (count($enviosEnProceso) > 0)
                                        <span class="opacity-7 text-warning"><i data-feather="package"></i></span>
                                        @else
                                        <span class="opacity-7 text-muted"><i data-feather="package"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ count($listoParaRetirar) }}</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Listo para retirar
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        @if (count($listoParaRetirar) > 0)
                                        <span class="opacity-7 text-success"><i data-feather="message-circle"></i></span>
                                        @else
                                        <span class="opacity-7 text-muted"><i data-feather="message-circle"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">{{ count($recibidosMes) }}</h2>
                                            </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Recibidos este mes
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        @if (count($recibidosMes) > 0)
                                        <span class="opacity-7 text-dark"><i data-feather="inbox"></i></span>
                                        @else
                                        <span class="opacity-7 text-muted"><i data-feather="inbox"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (count($enviosAdmin) > 0)
                            <div class="card-body mt-3">
                                <h4 class="card-title mb-4">Tienes Envíos</h4>
                                <div class="row">
                                <div class="table-responsive" id="search_list">
                                    <table id="zero_config" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Remitente</th>
                                                <th>Sucursal</th>
                                                <th>Estado</th>
                                                <th>Fecha de envío</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($enviosAdmin as $key=>$envio)
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
                                                    @if ($envio->aprobadoPamDestino == 'N' && $envio->aprobadoPamRemitente == 'N')
                                                    <span class="badge rounded-pill text-bg-warning">Enviado</span>
                                                    @elseif($envio->aprobadoPamDestino == 'N' && $envio->aprobadoPamRemitente == 'Y')
                                                    <span class="badge rounded-pill text-bg-danger">En camino</span>
                                                    @else
                                                    <a class="btn btn-success btn-rounded" href="admin/recibido?id={{$envio->id}}" style="font-size: 12px; padding: 3px 7px;"><i class="fas fa-check" style="margin-right:5px;"></i>Recibido</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{date_format(date_create($envio->fechaRecibido), "d/m/Y")}}
                                                </td>
                                                <td>
                                                    {{ $envio->descripcionPaquete }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex flex-row flex-wrap">
                                        @foreach($pams as $pam)
                                        <span class="badge rounded-pill text-bg-warning">{{$pam->primerNombre}} {{$pam->primerApellido}}</span>
                                        @endforeach
                                    </div>
                                    <div class="pagination" style="display:flex;flex-direction:row;justify-content:center;"></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="w-100 d-flex flex-row justify-content-center align-items-center" style="height: 200px;">
                            <div class="d-flex flex-row"><i data-feather="send" class="feather-icon me-2"></i><p>No hay envíos...</p></div>
                        </div>
                        @endif
                    </div>
                </div></div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->






@endsection