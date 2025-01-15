<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\GruposUsuarios;
use App\Models\Sucursal;
use App\Models\Envio;
use App\Models\Paquete;
use App\Models\Codigo;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Session;

class AdminController extends Controller
{
    private $model;

    public function __construct() 
    {
    }

    

    public function admin()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        return view('admin.admin-dashboard', ['fecha' => $mifecha, 'rol' => $variable, 'enviosEnProceso' => Envio::enviosEnProceso(Session::get('user_id')), 'listoParaRetirar' => Envio::listoParaRetirar(Session::get('user_id')), 'recibidosMes' => Envio::recibidosMes(Session::get('user_id')), 'enviosAdmin' => Envio::enviosAdminJoin(Session::get('user_id')), 'pams' => User::pamsSucursal(Session::get('sucursalId')), 'enviosRecibidosMes' => Envio::enviosRecibidosMes(Session::get('user_id'))]);
    }



    public function addUsuarios()
    {
        if (GruposUsuarios::accesoAddUser(Session::get('rol')))
        {
            $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $todasSucursales = new Sucursal;
        $sucursales = $todasSucursales->obtenerTodos();
        $gruposDeUsuarios = $grupos->obtenerTodos();
        return view('admin.admin-add-usuarios', ['fecha' => $mifecha, 'gruposDeUsuarios' => $gruposDeUsuarios, 'sucursales' => $sucursales, 'listaUsuarios' => User::usuariosPorSucursal(1), 'totales' => User::usuariosTotales(), 'admins' => User::adminsTotales(), 'estats' => User::userEstadisticas()]);
        }
        else
        {
            return abort(404);
        }
    }


    public function addGrupos()
    {
        $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $gruposDeUsuarios = $grupos->obtenerTodos2();
        return view('admin.admin-add-grupos', ['fecha' => $mifecha, 'gruposDeUsuarios' => $gruposDeUsuarios, 'modmod' => false, 'listaUsuarios' => User::usuariosPorRol(1)]);
    }

    public function nuevoGrupo(Request $request)
    {
        $obj = new GruposUsuarios([
            'nombre' => $request->post('nombre'),
            'descripcion' => $request->post('descripcion'),
            'hacerEnvios' => $request->post('envios') == 'on' ? 'Y' : 'N',
            'modificarPaquetes'=> $request->post('modenvios') == 'on' ? 'Y' : 'N', 
            'verEstadisticasGlobales'=> $request->post('statglobales') == 'on' ? 'Y' : 'N', 
            'crearUsuarios'=> $request->post('usuarios') == 'on' ? 'Y' : 'N',
            'gestionarPaquetes'=> $request->post('paqsucursal') == 'on' ? 'Y' : 'N',
            'modificarUsuarios'=> $request->post('modusuarios') == 'on' ? 'Y' : 'N'
        ]);
        $obj->save();
        return redirect('/admin/grupos')->with(['resultado' => "S"]);
    }

    public function addUser(Request $request)
    {
        if (User::validacionEmailUser($request->post('email')))
        {
            $obj = new User([
                'primerNombre' => $request->post('primerNombre'),
                'segundoNombre' => $request->post('segundoNombre'),
                'tarcerNombre' => $request->post('tercerNombre'),
                'primerApellido'=> $request->post('primerApellido'), 
                'segundoApellido'=> $request->post('segundoApellido'), 
                'apellidoCasada'=> $request->post('apellidoCasada'),
                'genero'=> $request->post('genero') == 'on' ? 'M' : 'F',
                'email'=> $request->post('email'),
                'password'=> Hash::make($request->post('password')),
                'cargo'=> $request->post('cargo'),
                'id_rol_usuarios'=> $request->post('id_rol_usuarios'),
                'id_sucursal'=> $request->post('id_sucursal')
            ]);
            $obj->save();
            return redirect('/admin/add-usuarios')->with(['resultado' => "S"]);
        }
        else
        {
            return redirect('/admin/add-usuarios')->with(['resultado' => "ya existe"]);
        }
    }


    public function eliminarGrupo($id)
    {
        if ($id > 4){
            $obj = new GruposUsuarios;
            $usuarios = new User;
            $usuarios->cambiarUsuariosABasicos($id);
            $obj->delGrupo($id);
            return redirect('/admin/grupos')->with(['resultado' => "B"]);
        }
        else{
            return redirect('/admin/grupos')->with(['resultado' => "N"]);
        }
    }

    public function modificarGrupo($id)
    {
        $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $gruposDeUsuarios = $grupos->obtenerTodos2();
        if ($id > 4){
            $obj = new GruposUsuarios;
            $encontrado = $obj->obtenerGrupo($id);
            return view('admin.admin-add-grupos', ['fecha' => $mifecha, 'gruposDeUsuarios' => $gruposDeUsuarios, 'modmod' => true, 'modGrupo' => $encontrado, 'listaUsuarios' => User::usuariosPorRol(1)]);
        }
    }

    public function updateGrupo(Request $request)
    {
        if ($request->post('nombre') != '')
        {
            $obj = new GruposUsuarios;
        $grupo = $obj->obtenerGrupo($request->post('id'));
        $grupo->nombre = $request->post('nombre');
        $grupo->descripcion = $request->post('descripcion');
        $grupo->hacerEnvios = $request->post('envios') == 'on' ? 'Y' : 'N';
        $grupo->modificarPaquetes = $request->post('modenvios') == 'on' ? 'Y' : 'N';
        $grupo->verEstadisticasGlobales = $request->post('statglobales') == 'on' ? 'Y' : 'N';
        $grupo->crearUsuarios = $request->post('usuarios') == 'on' ? 'Y' : 'N';
        $grupo->gestionarPaquetes = $request->post('paqsucursal') == 'on' ? 'Y' : 'N';
        $grupo->modificarUsuarios = $request->post('modusuarios') == 'on' ? 'Y' : 'N';
        $grupo->save();
        return redirect('/admin/grupos')->with(['resultado' => "Z"]);
        }
        else {
            return redirect('/admin/grupos')->with(['resultado' => "X"]);
        }
    }


    

    

    public function search(Request $request) {
        if ($request->ajax())
        {
            // User::where('id_sucursal','LIKE', '%'.$request->get('search').'%')->get();
            Paginator::useBootstrap();
            $usuarios = User::where('id_sucursal', $request->get('search'))->paginate(20);
            $output = '<table id="zero_config" class="table">
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
                                        <tbody>';
            if ($request->get('page'))
            {
                $band = (20 * (intval($request->get('page')) - 1))+1;
            }else {
                $band = 1;
            }            
            foreach($usuarios as $usuario){
                    $output .= '<tr><td>'.$band.'</td><td>'.$usuario->primerNombre.' '.$usuario->segundoNombre.' '.$usuario->primerApellido.' ';
                    if ($usuario->apellidoCasada != '')
                    {
                        $output .= $usuario->apellidoCasada.'</td><td>';
                    }
                    else
                    {
                        $output .= $usuario->segundoApellido.'</td><td>';
                    }
                    $output .= $usuario->genero.'</td><td>'.$usuario->email.'</td><td>'.GruposUsuarios::nombreDelGrupo($usuario->id_rol_usuarios).'</td><td>'.$usuario->cargo.'</td></tr>';
                    ++$band;
                }
            $output .= '</tbody></table><div class="pagination" style="display:flex;flex-direction:row;justify-content:center;>'.$usuarios->links().'</div>';
            return $output;
        }       
        
    }





    public function searchg(Request $request) {
        if ($request->ajax())
        {
            // User::where('id_sucursal','LIKE', '%'.$request->get('search').'%')->get();
            Paginator::useBootstrap();
            $usuarios = User::where('id_rol_usuarios', $request->get('search'))->paginate(20);
            $output = '<table id="zero_config" class="table">
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
                                        <tbody>';
            if ($request->get('page'))
            {
                $band = (20 * (intval($request->get('page')) - 1))+1;
            }else {
                $band = 1;
            }            
            foreach($usuarios as $usuario){
                    $output .= '<tr><td>'.$band.'</td><td>'.$usuario->primerNombre.' '.$usuario->segundoNombre.' '.$usuario->primerApellido.' ';
                    if ($usuario->apellidoCasada != '')
                    {
                        $output .= $usuario->apellidoCasada.'</td><td>';
                    }
                    else
                    {
                        $output .= $usuario->segundoApellido.'</td><td>';
                    }
                    $output .= $usuario->genero.'</td><td>'.$usuario->email.'</td><td>'.$usuario->cargo.'</td><td>'.Sucursal::nombreDeSucursal($usuario->id_sucursal).'</td></tr>';
                    ++$band;
                }
            $output .= '</tbody></table><div class="pagination" style="display:flex;flex-direction:row;justify-content:center;>'.$usuarios->links().'</div>';
            return $output;
        }       
        
    }

    public function modUser()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        return view('admin.admin-modificar-usuario', ['fecha' => $mifecha, 'mod' => false]);
    }

    public function modUserMod($id)
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $todasSucursales = new Sucursal;
        $sucursales = $todasSucursales->obtenerTodos();
        $gruposDeUsuarios = $grupos->obtenerTodos();
        return view('admin.admin-modificar-usuario', ['fecha' => $mifecha, 'mod' => true, 'gruposDeUsuarios' => $gruposDeUsuarios, 'sucursales' => $sucursales, 'usuario' => User::destinatarioEntrante($id)]);
    }


    public function modificadoUser(Request $request)
    {
        $obj = User::destinatarioEntrante($request->post('iduser'));
        if ($obj->email == $request->post('email'))
        {
            $obj->primerNombre = $request->post('primerNombre');
            $obj->segundoNombre = $request->post('segundoNombre');
            $obj->tarcerNombre = $request->post('tercerNombre');
            $obj->primerApellido = $request->post('primerApellido'); 
            $obj->segundoApellido = $request->post('segundoApellido'); 
            $obj->apellidoCasada = $request->post('apellidoCasada');
            if ($request->post('genero') == 'M')
            {$obj->genero = 'M';}
            else
            {$obj->genero = 'F';}
            if ($request->post('password') != '')
            {
                $obj->password = Hash::make($request->post('password'));
            }
            $obj->cargo = $request->post('cargo');
            $obj->id_rol_usuarios = $request->post('id_rol_usuarios');
            $obj->id_sucursal = $request->post('id_sucursal');
            $obj->save();
            return redirect('/admin/mod-user')->with(['resultado' => "S"]);
        }
        else
        {
            if (User::validacionEmailUserMod($request->post('email'),$obj->id))
        {
            $obj = [
                'primerNombre' => $request->post('primerNombre'),
                'segundoNombre' => $request->post('segundoNombre'),
                'tarcerNombre' => $request->post('tercerNombre'),
                'primerApellido'=> $request->post('primerApellido'), 
                'segundoApellido'=> $request->post('segundoApellido'), 
                'apellidoCasada'=> $request->post('apellidoCasada'),
                'genero'=> $request->post('genero') == 'on' ? 'M' : 'F',
                'email'=> $request->post('email'),
                'password'=> Hash::make($request->post('password')),
                'cargo'=> $request->post('cargo'),
                'id_rol_usuarios'=> $request->post('id_rol_usuarios'),
                'id_sucursal'=> $request->post('id_sucursal')
            ];
            $obj->save();
            return redirect('/admin/mod-user')->with(['resultado' => "S"]);
        }
        else
        {
            return redirect('/admin/mod-user')->with(['resultado' => "ya existe"]);
        }
        }
    }

    public function envio()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        $recientes = Envio::recientesPorUsuario(Session::get('user_id'));
        $todasSucursales = new Sucursal;
        $sucursales = $todasSucursales->obtenerTodos();
        return view('admin.admin-envio', ['fecha' => $mifecha, 'enviosRecientes' => $recientes]);
    }

    public function busquedaParaEnvio(Request $request)
    {
        if ($request->get('search') != '')
        {
            Paginator::useBootstrap();
            $usuarios = User::where('primerNombre','LIKE', '%'.$request->get('search').'%')
            ->orWhere('segundoNombre','LIKE', '%'.$request->get('search').'%')
            ->orWhere('primerApellido','LIKE', '%'.$request->get('search').'%')
            ->orWhere('segundoApellido','LIKE', '%'.$request->get('search').'%')
            ->orWhere('apellidoCasada','LIKE', '%'.$request->get('search').'%')->paginate(5);
            $output = '<table class="table no-wrap v-middle mb-0">
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
                                        <tbody>';       
            foreach($usuarios as $usuario){
                if ($usuario->id !== Session::get('user_id'))
                {$output .= '<tr>
                    <td class="border-top-0 px-2 py-4">
                        <div class="d-flex no-block align-items-center">
                                                                <div class="me-3"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                                                                <div class="">
                            <h5 class="text-dark mb-0 font-16 font-weight-medium">'.$usuario->primerNombre.' '.$usuario->segundoNombre.' '.$usuario->primerApellido.' ';
                            if ($usuario->apellidoCasada != '')
                            {
                                $output .= $usuario->apellidoCasada.'</h5>';
                            }
                            else
                            {
                                $output .= $usuario->segundoApellido.'</h5>';
                            }
                            $output .= '<span class="text-muted font-14">'.$usuario->email.'</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-top-0 text-muted px-2 py-4 font-14">';
                            $output .= $usuario->cargo.'</td>
                                                        <td class="border-top-0 px-2 py-4">'.Sucursal::nombreDeSucursal($usuario->id_sucursal).'</td>
                                                        <td class="border-top-0 text-muted px-2 py-4 font-14"><a onclick="enviouser('.$usuario->id.');" id="envio" class="boton btn btn-dark" data-bs-toggle="modal" data-bs-target="#ventanaModal">Hacer Envío</a></td>
                                                    </tr>'; 
                        }
                    }
            $output .= '</tbody></table><div class="pagination mt-2" style="display:flex;flex-direction:row;justify-content:center;>'.$usuarios->links().'</div>';
            return $output;
        }
        return '<table class="table no-wrap v-middle mb-0">
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
                                            </tbody></table>';
    }





    public function busquedaParaModEnvio(Request $request)
    {
        if ($request->get('search') != '')
        {
            Paginator::useBootstrap();
            $usuarios = User::where('id_sucursal','=', Session::get('sucursalId'))->where(function($query) use ($request){
                $query->where('primerNombre','LIKE', '%'.$request->get('search').'%');
                $query->orWhere('segundoNombre','LIKE', '%'.$request->get('search').'%');
                $query->orWhere('primerApellido','LIKE', '%'.$request->get('search').'%');
                $query->orWhere('segundoApellido','LIKE', '%'.$request->get('search').'%');
            })->paginate(3);
            $output = '<table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Nombre/Email
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Cambiar</th>
                                            </tr>
                                        </thead>
                                        <tbody>';       
            foreach($usuarios as $usuario){
                $output .= '<tr>
                    <td class="border-top-0 px-2 py-4">
                        <div class="d-flex no-block align-items-center">
                                                                <div class="me-3"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                                                                <div class="">
                            <h5 class="text-dark mb-0 font-16 font-weight-medium">'.$usuario->primerNombre.' '.$usuario->segundoNombre.' '.$usuario->primerApellido.' ';
                            if ($usuario->apellidoCasada != '')
                            {
                                $output .= $usuario->apellidoCasada.'</h5>';
                            }
                            else
                            {
                                $output .= $usuario->segundoApellido.'</h5>';
                            }
                            $output .= '<span class="text-muted font-14">'.$usuario->email.'</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <input hidden name="u_id" value="'.$usuario->id.'">
                                                        <td class="border-top-0 text-muted px-2 py-4 font-14"><button class="boton btn btn-dark" type="submit" onclick=(cambiarDestinatario('.$usuario->id.'))>Seleccionar</button></td>
                                                    </tr>'; 
                        }
            $output .= '</tbody></table><div class="pagination mt-2" style="display:flex;flex-direction:row;justify-content:center;></div>'; //'.$usuarios->links().'
            return $output;
        }
        return '<table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Nombre/Email
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Cambiar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" style="background-color:#f9fbfd; height: 200px; text-align: center;"><i data-feather="search" class="feather-icon"></i>No hay resultados...</td>
                                            </tr>
                                            </tbody></table>';
    }






    public function envioUsuario(Request $request)
    {
        $user = new User;
        $encontrado = $user->obtenerPorId($request->get('user'));
        $output = '<div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Realizar envío</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">';
        $output .= '<div class="d-flex flex-column align-items-center justify-content-center bg-light pt-4 mb-3"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>'.$encontrado->primerNombre.' '.$encontrado->segundoNombre.' '.$encontrado->primerApellido.' ';
        if ($encontrado->apellidoCasada != '')
        {
            $output .= $encontrado->apellidoCasada;
        }
        else
        {
            $output .= $encontrado->segundoApellido;
        }
        $output .= '</b></p><p>'.$encontrado->email.'</p></div>';
        $output .= '<form action="/admin/enviado" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="m-0">Ingresa el código del paquete</p>
                                        <div class="d-flex flex-row mb-3"><label class="input-group-text" for="inputGroupSelect01">'.Sucursal::obtenerCodigo(Session::get('user_id')).'</label>
                                        <input type="text" name="codigo" class="form-control"></div>
                                        <input name="id_destinatario" value="'.$encontrado->id.'" hidden>
                                        <input name="id_remitente" value="'.Session::get('user_id').'" hidden>
                                        <input name="id_sucursal" value="'.$encontrado->id_sucursal.'" hidden>
                                      <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;"></textarea>';
        $output .= '</div>
                            <div class="modal-footer">
                                <button type="submit" class="enlace btn btn-danger">Enviar</button>
                                <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                            </div></form>';
        return $output;
    }






    public function envioUsuarioAnular(Request $request)
    {
        $envio = Envio::getEnvioRemi($request->get('envio'));
        $destinatario = User::destinatario($envio->idDestinatario);
        if ($envio->aprobadoPamRemitente == 'N' && $envio->anulado == 'N')
        {
            $output = '
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Envío</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="nuevo-form">
                    <div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>'.$envio->primerNombre.' '.$envio->primerApellido.'</b></p><p>'.$envio->nombreSucursal.'</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>'.$destinatario->primerNombre.' '.$destinatario->primerApellido.'</b></p><p>'.$destinatario->nombreSucursal.'</p></div></div>
                    <form action="" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">'.$envio->codigo.'</p><p class="m-0">Descripción del paquete...</p> 
                      <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled>'.$envio->descripcionPaquete.'</textarea></div>
            <div class="modal-footer">
                <a onclick="anularEnvio('.$envio->id.');" class="enlace btn btn-danger">Anular envío</a>
                <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
            </div></form>
                </div>';
        }
        else
        {
            $output = '
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Envío</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="nuevo-form">
                    <div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>'.$envio->primerNombre.' '.$envio->primerApellido.'</b></p><p>'.$envio->nombreSucursal.'</p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark mb-0 font-16 font-weight-medium"><b>'.$destinatario->primerNombre.' '.$destinatario->primerApellido.'</b></p><p>'.$destinatario->nombreSucursal.'</p></div></div>
                    <form action="" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">'.$envio->codigo.'</p><p class="m-0">Descripción del paquete...</p> 
                      <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled>'.$envio->descripcionPaquete.'</textarea></div>
            <div class="modal-footer">
                </div></form>
                </div>';
        }
        return $output;
    }





    public function envioUsuarioConfirmacion(Request $request)
    {
        $envio = Envio::getEnvioRemi($request->get('id'));
        $output = '
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModal1Label">Envío</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="nuevo-form">
                    <form action="envio-anulado" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">¿Está seguro que desea anular el envío '.$envio->codigo.'?<br>Ya no podrá volver a usar este código.</p>
                    <input hidden name="id" value="'.$envio->id.'"> 
                      <div class="modal-footer">
                <button type="submit" class="enlace btn btn-danger">Confirmar</button>
                <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
            </div></form>
                </div>';
        return $output;
    }



    public function envioAnulado(Request $request)
    {
        $envio = Envio::getEnvio($request->get('id'));
        $envio->anulado = 'Y';
        $codigo = Codigo::codigoPorId($envio->idCodigoPaquete);
        $codigo->disponible = 'Y';
        $envio->save();
        $codigo->save();
        return redirect('/admin/mis-envios')->with(['resultado' => "anulado"]);
    }






    public function enviadoPaquete(Request $request)
    {
        $cod = Sucursal::obtenerCodigo(Session::get('user_id'));
        $nuevoCodigo =  $cod.$request->get('codigo');
        switch (Codigo::probarCodigo($nuevoCodigo,$cod)) {
            case 'aprobado':
                if (User::validacionPamSucursal($request->get('id_sucursal')))
                {
                    if ($request->get('descripcion') != '')
                {
                    $nuevoPaquete = new Paquete([
                        'descripcionPaquete' => $request->get('descripcion')
                    ]);
                    $nuevoPaquete->save();
                    $modCodigo = Codigo::getCodigo($nuevoCodigo);
                    $nuevoEnvio = new Envio([
                        'idRemitente' => $request->get('id_remitente'),
                        'idDestinatario' => $request->get('id_destinatario'),
                        'sucDestinatario' => User::getSucursal($request->get('id_destinatario')),
                        'sucRemitente' => Session::get('sucursalId'),
                        'idDescripcionPaquete'=> $nuevoPaquete->id, 
                        'idCodigoPaquete'=> $modCodigo->id,
                        'anulado' => 'N',
                        'aprobadoPamRemitente' => 'N',
                        'aprobadoPamDestino' => 'N',
                        'recibidoDestinatario' => 'N'
                    ]);
                    $nuevoEnvio->save();
                    $modCodigo->disponible = 'N';
                    $modCodigo->impreso = 'N';
                    $modCodigo->save();
                    return redirect('/admin/envio')->with(['resultado' => "S"]);
                }
                else
                {
                    $modCodigo = Codigo::getCodigo($nuevoCodigo);
                    $nuevoEnvio = new Envio([
                        'idRemitente' => $request->get('id_remitente'),
                        'idDestinatario' => $request->get('id_destinatario'),
                        'sucDestinatario' => User::getSucursal($request->get('id_destinatario')),
                        'sucRemitente' => Session::get('sucursalId'), 
                        'idCodigoPaquete'=> $modCodigo->id,
                        'anulado' => 'N',
                        'aprobadoPamRemitente' => 'N',
                        'aprobadoPamDestino' => 'N',
                        'recibidoDestinatario' => 'N'
                    ]);
                    $nuevoEnvio->save();
                    $modCodigo->disponible = 'N';
                    $modCodigo->save();
                    return redirect('/admin/envio')->with(['resultado' => "S"]);
                }
                }
                else
                {
                    return redirect('/admin/envio')->with(['resultado' => "pam"]);
                }
                break;
            case 'equivocado':
                return redirect('/admin/envio')->with(['resultado' => "E"]);
                break;
            case 'no disponible':
                return redirect('/admin/envio')->with(['resultado' => "N"]);
                break;
            case 'no hay':
                return redirect('/admin/envio')->with(['resultado' => "G"]);
                break;
        }
    }

    public function misEnvios()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        return view('admin.admin-misenvios', ['fecha' => $mifecha, 'misEnvios' => Envio::enviosTerminadosJoin(Session::get('user_id'))]);
    }

    public function modEnvio()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        $enviosEnt = Envio::enviosEntrantesGestores(Session::get('sucursalId'));
        return view('admin.admin-modificar-envio', ['fecha' => $mifecha, 'enviosEnt' => $enviosEnt]);        
    }

    public function globStats()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha();
        return view('admin.admin-estadisticas-globales', ['fecha' => $mifecha]);
    }

    public function gestPaquete()
    {
        $variable = Session::get('rol');
        $envios = Envio::enviosGestores(Session::get('sucursalId'));
        $enviosEnt = Envio::enviosEntrantesGestores(Session::get('sucursalId'));
        $mifecha = $this->fecha();
        return view('admin.admin-gestionar-paquetes', ['fecha' => $mifecha, 'envios' => $envios, 'enviosEnt' => $enviosEnt]);
    }

    public function getDescripcion(Request $request)
    {
        $envio = Envio::getEnvioModal($request->get('id'));
        $destinatario = User::destinatarioEntrante($request->get('de'));
        $output = '<div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$envio->primerNombre.' '.$envio->primerApellido.'</b></p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$destinatario->primerNombre.' '.$destinatario->primerApellido.'</b></p></div></div>
                                <form action="envio-aprobsal" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">'.$envio->codigo.'</p><p class="m-0">Descripción del paquete...</p> 
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled>'.$envio->descripcionPaquete.'</textarea></div>
                                  <input type="text" name="envioId" value="'.$envio->id.'" hidden>
                                  <input type="text" name="codigoId" value="'.$envio->idCodigoPaquete.'" hidden>
                        <div class="modal-footer">
                            <button type="submit" class="enlace btn btn-danger">Aprobar</button>
                            <a onclick="getAnular('.$envio->id.');" class="btn btn-dark">Anular</a>
                        </div></form>';
        return $output;
    }

    public function getAnular(Request $request)
    {
        $envio = Envio::getEnvioModal($request->get('id'));
        $output = '<div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$envio->primerNombre.' '.$envio->primerApellido.'</b></p><div style="position:absolute; right:-10%;"><img src="/images/arrow-right-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b></b></p></div></div>
                                <form action="envio-aprobsal" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">'.$envio->codigo.'</p><p class="m-0">Descripción del paquete...</p> 
                                  <p class="fs-3">Seguro</p></div>
                                  <input type="text" name="envioId" value="'.$envio->id.'" hidden>
                        <div class="modal-footer">
                            <button type="submit" class="enlace btn btn-danger">Aprobar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                        </div></form>';
        return $output;
    }

    public function envioAprob(Request $request)
    {
        $envio = Envio::getEnvio($request->get('envioId'));
        $envio->aprobadoPamRemitente = 'Y';
        $envio->save();
        Codigo::impresoNo($request->get('codigoId'));
        return redirect('/admin/gest-paquete')->with(['resultado' => "S"]);
    }

    public function gestEntrante(Request $request)
    {
        $envio = Envio::getEnvioModal($request->get('id'));
        $destinatario = User::destinatarioEntrante($request->get('de'));
        $output = '<div class="d-flex flex-row align-items-center justify-content-center bg-light pt-4 mb-3"><div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$destinatario->primerNombre.' '.$destinatario->primerApellido.'</b></p><div style="position:absolute; right:-10%;"><img src="/images/arrow-left-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$envio->primerNombre.' '.$envio->primerApellido.'</b></p></div></div>
                                <form action="envio-aprobent" method="GET"><div class="input-group mb-3 d-flex flex-column justify-content-center align-items-center"><p class="fs-3">'.$envio->codigo.'</p><p class="m-0">Descripción del paquete...</p> 
                                  <textarea maxlength="149" name="descripcion" class="form-control w-100" rows="3" placeholder="Descripción del paquete..." style="height: 164px;" disabled>'.$envio->descripcionPaquete.'</textarea></div>
                                  <input type="text" name="envioId" value="'.$envio->id.'" hidden>
                        <div class="modal-footer">
                            <button type="submit" class="enlace btn btn-danger">Aprobar</button>
                            <button type="reset" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        </div></form>';
        return $output;
    }

    public function gestEntrante2(Request $request)
    {
        $envio = Envio::getEnvioModal($request->get('id'));
        $destinatario = User::destinatarioEntrante($request->get('de'));
        $output = '<div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$destinatario->primerNombre.' '.$destinatario->primerApellido.'</b></p><div style="position:absolute; right:-10%;"><img src="/images/arrow-left-circle.svg" style="width:40px; height: 40px;"></div></div><div class="d-flex flex-column justify-content-center align-items-center w-50"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle mb-3" width="45" height="45"><p class="text-dark font-16 font-weight-medium"><b>'.$envio->primerNombre.' '.$envio->primerApellido.'</b></p></div></div>';
        return $output;
    }

    public function envioAprobent(Request $request)
    {
        $envio = Envio::getEnvio($request->get('envioId'));
        $envio->aprobadoPamDestino = 'Y';
        $envio->save();
        return redirect('/admin/gest-paquete')->with(['resultado' => "S"]);
    }

    public function envioRecibido(Request $request)
    {
        $envio = Envio::getEnvio($request->get('id'));
        $envio->recibidoDestinatario = 'Y';
        $envio->fechaRecibido = $this->fechaYhora();
        $envio->save();
        return redirect('/admin');
    }


    public function fechaYhora()
    {
        date_default_timezone_set('America/El_Salvador');
        return date("Y-m-d H:i:s");
    }

    public function busquedaParaUsuario(Request $request)
    {
        if ($request->get('search') != '')
        {
            Paginator::useBootstrap();
            $usuarios = User::where('primerNombre','LIKE', '%'.$request->get('search').'%')
            ->orWhere('segundoNombre','LIKE', '%'.$request->get('search').'%')
            ->orWhere('primerApellido','LIKE', '%'.$request->get('search').'%')
            ->orWhere('segundoApellido','LIKE', '%'.$request->get('search').'%')
            ->orWhere('apellidoCasada','LIKE', '%'.$request->get('search').'%')->paginate(5);
            $output = '<table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Nombre/Email
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Cargo
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Sucursal</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>';       
            foreach($usuarios as $usuario){
                $output .= '<tr>
                    <td class="border-top-0 px-2 py-4">
                        <div class="d-flex no-block align-items-center">
                                                                <div class="me-3"><img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle" width="45" height="45"></div>
                                                                <div class="">
                            <h5 class="text-dark mb-0 font-16 font-weight-medium">'.$usuario->primerNombre.' '.$usuario->segundoNombre.' '.$usuario->primerApellido.' ';
                            if ($usuario->apellidoCasada != '')
                            {
                                $output .= $usuario->apellidoCasada.'</h5>';
                            }
                            else
                            {
                                $output .= $usuario->segundoApellido.'</h5>';
                            }
                            $output .= '<span class="text-muted font-14">'.$usuario->email.'</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-top-0 text-muted px-2 py-4 font-14">';
                            $output .= $usuario->cargo.'</td>
                                                        <td class="border-top-0 px-2 py-4">'.Sucursal::nombreDeSucursal($usuario->id_sucursal).'</td>
                                                        <td class="border-top-0 text-muted px-2 py-4 font-14"><a href="mod-user/mod/'.$usuario->id.'" class="boton btn btn-dark">Modificar</a></td>
                                                    </tr>'; 
                        
                    }
            $output .= '</tbody></table><div class="pagination mt-2" style="display:flex;flex-direction:row;justify-content:center;>'.$usuarios->links().'</div>';
            return $output;
        }
        return '<table class="table no-wrap v-middle mb-0">
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
                                            </tbody></table>';
    }





    public function modDestinatario($id_envio, Request $request)
    {
        $envio = Envio::getEnvio($id_envio);
        $envio->idDestinatario = $request->get('u_id');
        $envio->save();
        return redirect('/admin/modificar-envio')->with(['resultado' => "anulado"]);
    }

   
    public function codigos()
    {
        
        $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $todasSucursales = new Sucursal;
        $sucursales = $todasSucursales->obtenerTodos();
        return view('admin.admin-codigos', ['fecha' => $mifecha, 'sucursales' => $sucursales, 'listaCodigos' => Codigo::codigosDeSucursal('OSA')]);
        
    }




    public function fecha()
    {
      date_default_timezone_set('America/El_Salvador');
            switch (date('l')) {
                case 'Sunday':
                  $dia = 'Domingo';
                  break;
                case 'Monday':
                  $dia = 'Lunes';
                  break;
                case 'Tuesday':
                  $dia = 'Martes';
                  break;
                case 'Wednesday':
                  $dia = 'Miércoles';
                  break;
                case 'Thursday':
                  $dia = 'Jueves';
                  break;
                case 'Friday':
                    $dia = 'Viernes';
                    break;
                case 'Saturday':
                    $dia = 'Sábado';
                    break;  
                default:
                   $dia = date('l');
              }
              switch (date('M')) {
                case 'Jan':
                  $mes = 'Ene';
                  break;
                case 'Aug':
                  $mes = 'Ago';
                  break;
                case 'Dec':
                  $mes = 'Dic';
                  break;
                default:
                   $mes = date('M');
              }
              $mifecha = $dia . ', ' . date('d') . ' de ' . $mes;
              return $mifecha;
    }
}
