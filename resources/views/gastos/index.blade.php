@extends('layouts.app')
@section('content')

<div class="container">

<a class="btn btn-primary" href="{{ url('gastos/create') }}">Agregar nuevo gasto</a>

<div class="mt-3">
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif
</div>

<table class="table table-light responsive-table">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Valor</th>
      <th>Tarjeta asociada</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($gastos as $gasto)
    <tr>
      <td>{{ $gasto->id }}</td>
      <td>{{ $gasto->Nombre }}</td>
      <td>{{ $gasto->Descripcion }}</td>
      <td>{{ $gasto->Valor}}</td>
      <td>{{ $gasto->tarjeta_id }}</td>
      <td>
        <div class="d-flex justify-content-around">
          <form action="{{ url('/gastos/'.$gasto->id.'/edit') }}" method="get">
            @csrf
            <input class="btn btn-info" type="submit"
            Value="Editar">
          </form>
          <form action="{{ url('/gastos/'.$gasto->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit"
            onclick="return confirm('¿Estas seguro que deseas borrar? Esta operacion es irreversible')"
            Value="Borrar">
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
{!! $gastos->links() !!}
</div>
@endsection
