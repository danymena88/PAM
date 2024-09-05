<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Curso;
use App\Models\Capitulo;
use Session;

class VentasController extends Controller
{
    private $model;
    public function suscripcion($id_curso)
    {
        $curso = new Curso;
        $encontrado = $curso->getById($id_curso);
        $user_id = Session::get('user_id');
        $obj = new Venta;
        $obj->finaliza = $this->expiraFecha();
        $obj->pago = $encontrado->precio;
        $obj->id_usuario = $user_id;
        $obj->id_curso = $encontrado->id;
        $obj->save();
        $url = 'cursos/';
        $delimiter = '-'; 
        $url .= strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $encontrado->nombre))))), $delimiter));
        return redirect($url)->with(['resultado' => "S"]);
    }

    public function verCapitulos($curso,$num)
    {
        $obj = new Curso;
        $todos = $obj->obtenerTodos();
        foreach ($todos as $uno)
        {
            $delimiter = '-'; 
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $uno->nombre))))), $delimiter));
            if ($slug == $curso)
            {
                $variable = $obj->getById($uno->id);
            }
        }
        $venta = new Venta;
        $ventaEncontrada = $venta->getVentaDeUser(Session::get('user_id'), $variable->id);
        if ($ventaEncontrada)
        {
            if ($ventaEncontrada->finaliza > $this->ahora())
            {
                $cap = new Capitulo;
                $capResultado = $cap->capituloget($variable->id,$num);
                $siguiente = intval($capResultado->num_capitulo) + 1;
                return view('capitulo', ['capitulo' => $capResultado, 'curso' => $variable, 'siguiente' => $siguiente]);
            }
            else
            {
                return 'Curso expirado';
            }
        }
        else
        {
            return view('noautorizado');
        }
    }


    public function expiraFecha()
    {
      date_default_timezone_set('America/El_Salvador');
      return date( 'Y-m-d', strtotime('+1 year'));
    }

    public function ahora()
    {
      date_default_timezone_set('America/El_Salvador');
      return date('Y-m-d');
    }
}

