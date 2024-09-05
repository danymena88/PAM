<?php

namespace App\Http\Controllers;

use App\Models\LineaProduccion;
use App\Models\Capitulo;
use App\Models\Curso;
use App\Models\User;
use App\Models\Venta;
use App\Models\GruposUsuarios;
use App\Models\Sucursal;
use App\Models\RolUsuarios;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    private $model;

    public function __construct() 
    {
        $this->model = new LineaProduccion();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #$lineaProduccionList = $this->model->obtenerTodos();


        //return view('lineaproduccion.lista', [
        //    'lineaProduccionList' => $lineaProduccionList
        //]);
        return view('lineaproduccion.lista');
    }

    public function admin()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha(); 
        if ($variable == 1)
        {
            return view('admin.admin-dashboard', ['fecha' => $mifecha]);
        }
        else
        {
            return view('noautorizado');
        }
        
    }

    public function vercursos()
    {
        $variable = Session::get('rol');
        $mifecha = $this->fecha(); 
        if ($variable == 1)
        {
            return view('admin.admin-ver-cursos', ['fecha' => $mifecha]);
        }
        else
        {
            return redirect('/');
        }
        
    }


    public function accionescursos()
    {
        $variable = Session::get('user_id');
        $mifecha = $this->fecha();
        if ($variable == 1)
        {
            $obj = new Curso;
            $listaCursos = $obj->obtenerTodos();
            return view('admin.admin-acciones-cursos', ['fecha' => $mifecha, 'cursos' => $listaCursos]);
        }
        else
        {
            return redirect('/');
        }
        
    }

    public function eliminarCurso(Request $request)
    {
      if ($request->post('id') == 'off')
      {
        return redirect('/admin/acciones-cursos');
      }
      else
      {
        $obj = new Curso;
        $obj->eliminarPorId($request->post('id'));
        return redirect('/admin/acciones-cursos')->with(['resultado' => "E"]);
      }
    }


    public function addUsuarios()
    {
        $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $todasSucursales = new Sucursal;
        $sucursales = $todasSucursales->obtenerTodos();
        $gruposDeUsuarios = $grupos->obtenerTodos();
        return view('admin.admin-add-usuarios', ['fecha' => $mifecha, 'gruposDeUsuarios' => $gruposDeUsuarios, 'sucursales' => $sucursales]);
    }


    public function addGrupos()
    {
        $mifecha = $this->fecha();
        $grupos = new GruposUsuarios;
        $gruposDeUsuarios = $grupos->obtenerTodos();
        return view('admin.admin-add-grupos', ['fecha' => $mifecha, 'gruposDeUsuarios' => $gruposDeUsuarios]);
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
            'estadisticasDeSuSucursal'=> $request->post('statsucursales') == 'on' ? 'Y' : 'N',
            'gestionarPaquetes'=> $request->post('paqsucursal') == 'on' ? 'Y' : 'N',
            'gestionarPaquetesGlobales'=> $request->post('paqglobales') == 'on' ? 'Y' : 'N',
            'modificarUsuarios'=> $request->post('modusuarios') == 'on' ? 'Y' : 'N'
        ]);
        $obj->save();
        return redirect('/admin/grupos')->with(['resultado' => "S"]);
    }

    public function eliminarGrupo($id)
    {
        if ($id > 4){
            $obj = new GruposUsuarios;
            $usuarios = new User;
            $usuarios->cambiarUsuariosABasicos($id);
            $obj->delGrupo($id);
        }
    }


    public function accionescursosPost(Request $request)
    {
      $validacion = new Curso;
      $validacion2 = $validacion->buscarXnombre($request->post('nombre'));
      if ($validacion2)
      {
        return redirect('/admin/acciones-cursos')->with(['resultado' => "N"]);
      }
      else 
      {
        $caps = (is_numeric($request->post('capitulos')) ? (int)$request->post('capitulos') : 1);
        $price = sprintf("%.2f", $request->post('precio'));
        $obj = new Curso([
        'nombre' => $request->post('nombre'),
        'descripcion' => $request->post('descripcion'),
        'enlace_imagen' => $request->post('enlace'),
        'capitulos' => $caps,
        'precio' => $price,
        'isactive' => $request->post('isactive') == 'on' ? 'Y' : 'N'
        ]);
        $obj->save();
        return redirect('/admin/acciones-cursos')->with(['resultado' => "S"]);
      }
        
    }

    public function accionesusuarios()
    {
        $variable = Session::get('user_id');
        $mifecha = $this->fecha();
        if ($variable == 1)
        {
            $obj = new User;
            $listaUsuarios = $obj->obtenerTodos();
            $encontrado = new User;
            $encontrado->name = '$$$';
            return view('admin.admin-usuarios-acciones', ['fecha' => $mifecha, 'usuarios' => $listaUsuarios, 'encontrado' => $encontrado]);
        }
        else
        {
            return redirect('/');
        }
        
    }

    public function search(Request $request) {
        if ($request->ajax())
        {
            $usuarios = User::where('name','LIKE', '%'.$request->get('search').'%')->get();
            $output = '';
            if (count($usuarios) > 0)
            {
                foreach($usuarios as $usuario){
                    if($usuario->id_rol == 1){
                        $rol = 'Administrador';
                    }else{
                        $rol = 'Usuario';
                    }
                    $output .= '<tr><td><span class="fs-6">'.$usuario->id.'</span></td><td><a href="'.'usuarios-acciones/'.$usuario->id.'">'.$usuario->name.'</a></td><td>'.$usuario->email.'</td><td>'.$rol.'</td><td>'.$usuario->created_at.'</td></tr>';
                }
                return $output;
            }
        }
        
        
    }

    public function accionesId($id)
    {
        $variable = Session::get('user_id');
        $obj = new User;
        $listaUsuarios = $obj->obtenerTodos();
        $usuarioEncontrado = $obj->obtenerPorId($id);
        $mifecha = $this->fecha();
        return view('admin.admin-usuarios-acciones', ['fecha' => $mifecha, 'usuarios' => $listaUsuarios, 'encontrado' => $usuarioEncontrado]);
        
    }

    public function eliminarUserId($id)
    {
        $variable = Session::get('user_id');
        $obj = new User;
        $obj->eliminarPorId($id);
        return redirect('/admin/usuarios-acciones')->with(['resultado' => "S"]);
        
    }

    public function updateUserId($id, Request $request)
    {
        $variable = Session::get('user_id');
        $nombre = $request->post('nombre');
        $email = $request->post('email');
        if ($request->post('rol') == "Administrador"){
            $obj = new User;
            $obj->updatePorIdAdmin($id, $nombre, $email);
            return redirect('/admin/usuarios-acciones')->with(['resultado' => "N"]);
        }elseif($request->post('rol') == 'Usuario'){
            $obj = new User;
            $obj->updatePorIdUsuario($id, $nombre, $email);
            return redirect('/admin/usuarios-acciones')->with(['resultado' => "N"]);
        }else{
            return redirect('/admin/usuarios-acciones')->with(['resultado' => "U"]);
        }
    }

    public function accionescapitulos()
    {
        $variable = Session::get('user_id');
        $mifecha = $this->fecha();
        if ($variable == 1)
        {
            $obj = new Curso;
            $listaCapitulos = $obj->obtenerCapitulos();
            $cursos = $obj->obtenerTodos();
            return view('admin.admin-capitulos-acciones', ['fecha' => $mifecha, 'capitulos' => $listaCapitulos, 'cursos' => $cursos]);
        }
        else
        {
            return redirect('/');
        }
        
    }


    public function accionescapitulosPost(Request $request)
    {
        $variable = Session::get('user_id');
        if ($variable == 1)
        {
            $obj = new Capitulo([
                'num_capitulo' => $request->post('num_capitulo'),
                'enlace_imagen' => $request->post('enlace_imagen'),
                'enlace_video' => $request->post('enlace_video'),
                'descripcion' => $request->post('descripcion'),
                'id_curso'  => $request->post('id_curso')
                ]);
            $obj->save();
            return redirect('/admin/capitulos-acciones')->with(['resultado' => "S"]);
        }
        else
        {
            return redirect('/');
        }
        
    }

    public function eliminarcapitulo($id)
    {
        $obj = new Capitulo;
        $obj->eliminarPorId($id);
        return redirect('/admin/capitulos-acciones')->with(['resultado' => "N"]);

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lineaproduccion.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $obj = new LineaProduccion([
            'isactive' => $request->post('isactive') == 'on' ? 'Y' : 'N',
            'nombre' => $request->post('nombre')
        ]);

        $resultado = $this->model->crear($obj);

        return redirect('/linea_produccion/lista')->with(['resultado' => $resultado]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //obtemos el registro que queremos editar
        //y lo retornamos a la vista del formulario
        $lineaProduccion = $this->model->obtenerPorId($id);

        return view('lineaproduccion.actualizar', [
            'lineaProduccion' => $lineaProduccion
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            
            $lineaProduccion = $this->model->obtenerPorId($id);

            $lineaProduccion->isactive = $request->post('isactive') == 'on' ? 'Y' : 'N';
            $lineaProduccion->nombre = $request->post('nombre');

            $resultado = $this->model->actualizar($lineaProduccion);

            if ($resultado) {
                
                $resultado = "Y";

            } else {

                $resultado = "N";

            }

            return redirect('/linea_produccion/lista')->with(['resultado' => $resultado]);

        } catch (\Throwable $th) {
            
            return redirect('/linea_produccion/lista')->with(['resultado' => "N"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            //obtenemos el registro que se quiere eliminar
            $lineaProducion = $this->model->obtenerPorId($id);

            //pasamos el objeto al modelo para eliminarlo
            //y obtenemos la respuesta de la base de datos
            $resultado = $this->model->eliminar($lineaProducion);

            if ($resultado) {
                
                $resultado = "Y";

            } else {

                $resultado = "N";

            }

            return redirect('/linea_produccion/lista')->with(['resultado' => $resultado]);

        } catch (\Throwable $th) {

            return redirect('/linea_produccion/lista')->with(['resultado' => "N"]);
        }
        
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
