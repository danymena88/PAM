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
                                <form action="" id="myForm">
                                <div style="display:flex; flex-direction: row; flex-wrap: wrap;">
                                    @foreach ($sucursales as $key=>$sucursal)
                                    @if ($key == 0)
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
                                                <th>Codigo</th>
                                                <th>Disponible</th>
                                                <th>Impreso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listaCodigos as $key=>$codigo)
                                            <tr>
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    {{$codigo->codigo}}
                                                </td>
                                                <td>
                                                    @if ($codigo->disponible == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                    @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($codigo->impreso == 'Y')
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:green"></i>
                                                    @else
                                                    <i data-feather="check-square" class="feather-icon me-3" style="color:#e8e6e6"></i>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div class="pagination" style="display:flex;flex-direction:row;justify-content:center;">{{$listaCodigos->links()}}</div> --}}
                                    <button class="btn btn-dark rounded me-2" onclick="impresion()">Impresión de Códigos</button>
                                    <button class="btn btn-dark rounded" onclick="aprobarCodigos()">Validación de Códigos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>


                <script type="text/javascript">
                    $(document).ready(function(){
                        $("input[name='radiobutton']").click(function(){
                            var query = $(this).val();
                            $.ajax({
                                url: "/admin/search-codigos",
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
                    });

                    function impresion(){
                        $('input[name="radiobutton"]:checked').each(function() {
                            location.href="/admin/impresion-codigos?id_suc="+this.value;
                        });
                    };

                    function aprobarCodigos(){
                        $('input[name="radiobutton"]:checked').each(function() {
                            location.href="/admin/ya-impresos?id_suc="+this.value;
                        });
                    };
                    
                    
                    </script>
@endsection
