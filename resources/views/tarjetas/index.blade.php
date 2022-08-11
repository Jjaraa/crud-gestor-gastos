@extends('layouts.app')
@section('content')

<div class="container">

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a href="{{ url('tarjetas/create') }}">Agregar nueva tarjeta</a>

<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Número de tarjeta</th>
      <th>Banco</th>
      <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
    @foreach($tarjetas as $tarjeta)
    <tr>
      <td>{{ $tarjeta->id }}</td>
      <td>{{ $tarjeta->Nombre }}</td>
      <td>{{ $tarjeta->Numero }}</td>
      <td>{{ $tarjeta->Banco}}</td>
      <td>
        <div class="flex">
          <form action="{{ url('/tarjetas/'.$tarjeta->id.'/edit') }}" method="get">
            @csrf
            <input class="btn btn-info" type="submit"
            Value="Editar">
          </form>

          <form action="{{ url('/tarjetas/'.$tarjeta->id) }}" method="post">
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
{!! $tarjetas->links() !!}


</div>
@endsection
