@extends('layouts.app')
@section('content')

<div class="container">

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a href="{{ url('gastos/create') }}">Agregar nuevo gasto</a>

<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Valor</th>
      <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
    @foreach($gastos as $gasto)
    <tr>
      <td>{{ $gasto->id }}</td>
      <td>{{ $gasto->Nombre }}</td>
      <td>{{ $gasto->Descripcion }}</td>
      <td>{{ $gasto->Valor}}</td>
      <td>
        <div class="flex">
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
