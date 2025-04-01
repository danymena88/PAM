@extends('plantilla')
@section('titulo', 'Grupos de Usuarios')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                @if (App\Models\User::validacionDePamSucursal(session('sucursalId')))
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Realizar Envío </h4>
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
                @else
                <p>En su sucursal no hay gestor de paquetes, comuníquese con el personal de informática.</p>
                @endif



                <div class="modal fade" id="ventanaModal" tabindex="-1" aria-labelledby="ventanaModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" id="envio_modal">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Realizar envío</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="d-flex flex-column align-items-center justify-content-center bg-light pt-4 mb-3"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>Nombre</b></p><p>Email</p></div>
                                <form action="/admin/enviado" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="m-0">Ingresa el código del paquete</p>
                                    <div class="d-flex flex-row mb-3"><label class="input-group-text" for="inputGroupSelect01"></label>
                                    <input type="text" name="codigo" class="form-control"></div>
                                    <input name="id_destinatario" value="" hidden>
                                    <input name="id_remitente" value="" hidden>
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;"></textarea></div>
                        <div class="modal-footer">
                            <button type="submit" class="enlace btn btn-danger" disabled>Enviar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal" disabled>Cancelar</button>
                        </div></form>
                            </div>
                        </div>
                    </div>
                </div>


                @if (session('resultado') == 'S')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Envio agregado!
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
                                url: "/admin/search-envio",
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
                                url: "/admin/search-envio" + "?page=" + page,
                                type: "GET",
                                data:{'search' : query},
                                success:function(data){
                                    $('#search_list').html(data);
                                }
                            });
                        });
                    });

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
