<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos['tarjetas'] = Tarjeta::paginate(10);
      return view('tarjetas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tarjetas.create');
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
        'Numero' => 'required|string|max:12',
        'Banco' => 'required|string|max:100',
      ];
      $mensaje=[
              'required'=>'El :attribute es requerido',
              ];

      $this->validate($request,$campos,$mensaje);

      $datosTarjetas = request()->except('_token');
      Tarjeta::insert($datosTarjetas);

      return redirect('tarjetas')->with('mensaje','Tarjeta agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function show(Tarjeta $tarjeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tarjeta = Tarjeta::findOrFail($id);
      return view('tarjetas.edit', compact('tarjeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $datosTarjeta = request()->except([
          '_token',
          '_method'
      ]);
       Tarjeta::where('id', '=', $id)->update($datosTarjeta);

      return redirect('/tarjetas')->with('mensaje','Tarjeta actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tarjeta::destroy($id);
      return redirect('/tarjetas')->with('mensaje','Tarjeta eliminada con exito');
    }
}
