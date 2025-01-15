@extends('plantilla')
@section('titulo', 'Grupos de Usuarios')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (count($enviosEnt) > 0)
                            <div class="card-body mt-3">
                                <h4 class="card-title mb-4">Envíos Entrantes</h4>
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
                                        <tbody>
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
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Detalles del envío...</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <div id="nuevo-form2" class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-left-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p></div></div>
                                
                                
                                <div class="card-body">
                                    <div class="d-flex align-items-center mt-4">
                                        <h4 class="card-title">Cambiar destinatario... </h4>
                                    </div>
                                    <div class="form-group mb-3 row" >
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                        <div class="form-group mb-4">
                                                            
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="search" name="busqueda" placeholder="Buscar...">
                                                                    <small id="name13" class="badge badge-default text-bg-danger form-text float-end">Nombres/Apellidos</small>
                                                                </div>
                                                            
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
                                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Cargo</th>
                                                    
                                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Botón</th>
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
                </div>


                
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#search').on('keyup', function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "/admin/search-modenvio",
                                type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                            });
                        });
                    });

                    function gestEntrante(query,de) {
                        $('#search').attr('envio', query);
                    $.ajax({
                        url: "/admin/get-entrante2",
                        type: "GET",
                        data:{'id' : query, 'de' : de},
                        success:function(data){
                            $('#nuevo-form2').html(data);
                        }
                    });
                };


                function cambiarDestinatario(de) {
                    const div1 = document.getElementById("search");
                    const envio = div1.getAttribute("envio");
                    location.href="/admin/cambio-destinatario/"+envio+"?u_id="+de;
                };
                </script>

                
            
@endsection
