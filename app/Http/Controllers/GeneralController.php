<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Curso;

class GeneralController extends Controller
{
    private $model;
    public function getCurso($curso)
    {
        $obj = new Curso;
        $todos = $obj->obtenerTodos();
        $encontrado = '$';
        foreach ($todos as $uno)
        {
            $delimiter = '-'; 
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $uno->nombre))))), $delimiter));
            if ($slug == $curso)
            {
                $variable = $obj->getById($uno->id);
                return view('curso', ['curso' => $variable, 'slug' => $slug]);
            }
        }
        return redirect('/');
        

    }

    public function getCursos()
    {
        $obj = new Curso;
        $todos = $obj->obtenerTodos();
        return view('cursos', ['cursos' => $todos]);
    }
}
