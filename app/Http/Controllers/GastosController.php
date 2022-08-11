<?php

namespace App\Http\Controllers;

use App\Models\Gastos;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class GastosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['gastos'] = Gastos::paginate(10);
        $tarjetas['tarjetas'] = Tarjeta::all();
        return view('gastos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tarjetas['tarjetas'] = Tarjeta::all();
        return view('gastos.create', $tarjetas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre' => 'required|string|max:50',
            'Descripcion' => 'required|string|max:100',
            'Valor' => 'required|integer|max:10000000',
        ];
        $mensaje=[
                'required'=>'El :attribute es requerido',
                'Descripcion.required' => 'La descripcion es requerida',
                ];

        $this->validate($request,$campos,$mensaje);

        $datosGastos = request()->except('_token');
        Gastos::insert($datosGastos);

        return redirect('gastos')->with('mensaje','Gasto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function show(Gastos $gastos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto = Gastos::findOrFail($id);
        $tarjetas['tarjetas'] = Tarjeta::all();
        return view('gastos.edit', compact('gasto'), $tarjetas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosGastos = request()->except([
            '_token',
            '_method'
        ]);
        Gastos::where('id', '=', $id)->update($datosGastos);

        return redirect('/gastos')->with('mensaje','Gasto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gastos::destroy($id);
        return redirect('/gastos')->with('mensaje','Gasto eliminado con exito');
    }
}
