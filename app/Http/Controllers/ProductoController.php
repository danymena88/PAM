<?php

namespace App\Http\Controllers;

use App\Models\LineaProduccion;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = new Producto();

        $productoList = $model->obtenerTodos();
    
        return view('producto.lista', [
            'productoList' => $productoList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new LineaProduccion();

        $lineaProduccionList = $model->obtenerTodos();
        
        return view('producto.nuevo', [
            'lineaProduccionList' => $lineaProduccionList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new Producto([
            'isactive' => $request->post('isactive') == 'on' ? 'Y' : 'N',
            'nombre' => $request->post('nombre'),
            'created' => '2024-05-19', 
            'codigo'=> $request->post('nombre'), 
            'idlinea_produccion' => $request->post('idlinea_produccion')
        ]);

        $model = new Producto();

        $resultado = $model->crear($obj);

        return redirect('/producto/lista')->with(['resultado' => $resultado]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
