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
                                            <h2 class="text-dark mb-1 font-weight-medium">45</h2>
                                             </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Usuarios
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
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
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                                class="set-doller"></sup>45</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Ventas
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
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
                                            <h2 class="text-dark mb-1 font-weight-medium">43</h2>
                                            </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Cursos
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
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
                            <div class="card-body">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Resumen de ventas</h4>
                                            <h6 class="card-subtitle">Aquí encontrarás todas las ventas realizadas en <code style="color:blueviolet; font-size: 1rem;">Codeffee</code>.</h6>
                                           
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Usuario</th>
                                                <th>Id de Venta</th>
                                                <th>Curso</th>
                                                <th>Pago</th>
                                                <th>Finaliza</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search_list">
                                            {{-- @foreach ($ventas as $venta)
                                            <tr>
                                                <td><span class="fs-6">{{ $venta->created_at; }}</span></td>
                                                <td>{{ $venta->name; }}</td>
                                                <td>{{ $venta->id; }}</td>
                                                <td>{{ $venta->nombre; }}</td>
                                                <td>{{ $venta->pago; }}</td>
                                                <td>{{ $venta->finaliza; }}</td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div></div></div>
                </div></div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
@endsection