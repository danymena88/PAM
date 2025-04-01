@extends('plantilla')
@section('titulo', 'Cambio de Contraseña')

@section('contenido')
<!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Cambio de Contraseña</h4>
                                <h4 class="card-subtitle mt-2 mb-4">Ingresa tu contraseña actual y a continuación la nueva contraseña.</h4>
                                <div><form class="mt-3" action="verif-contra" method="POST">
                                    @csrf
                                    <label class="form-control-label" for="actual">Contraseña actual...</label>
                                    <input type="password" name="actual" id="actual" class="form-control">
                                    <div class="mt-2"><input onclick="cambioContra(this)" type="checkbox" class="custom-control-input" id="customCheck1">
                                        <span class="ms-2">Mostrar contraseña</span></div>
                                    <br><br>
                                    <label class="form-control-label" for="nueva">Nueva Contraseña...</label>
                                    <input type="password" name="nueva" id="nueva" class="form-control">
                                    <div class="mt-2"><input onclick="cambioContra2(this)" type="checkbox" class="custom-control-input" id="customCheck1">
                                        <span class="ms-2">Mostrar contraseña</span></div>
                                    <div class="modal-footer mt-4" style="display:flex;flex-direction:row;justify-content:space-between;">
                                        <div style="display:flex; flex-direction: row; align-items:center;"></div><div>
                                        <button class="enlace btn btn-danger">Aceptar</button>
                                        <button type="reset" class="btn btn-dark">Cancelar</button></div>
                                    </div>
                                </form></div>
                            </div>
                        </div>
                    </div>
                </div>




                @if (session('resultado') == 'debe')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Debe completar ambos campos!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif


                @if (session('resultado') == 'exito')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Contraseña cambiada con éxito!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif

                @if (session('resultado') == 'error')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show text-white" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #21272d;">
                    <div class="toast-body d-flex justify-content-between flex-row">
                    <i data-feather="thumbs-up" class="feather-icon me-3" style="color:white"></i>
                    Ingresó una contraseña incorrecta!
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    
                </div>
                </div>
                @endif




            <script>
                function cambioContra(cb) {
  if(cb.checked)
     $('#actual').attr("type","text");
  else
    $('#actual').attr("type","password");
};

function cambioContra2(cb) {
  if(cb.checked)
     $('#nueva').attr("type","text");
  else
    $('#nueva').attr("type","password");
};
            </script>

                


                
            
@endsection
