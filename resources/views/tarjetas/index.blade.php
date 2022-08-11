@extends('layouts.app')
@section('content')

<div class="container ">

<a class="btn btn-primary" href="{{ url('tarjetas/create') }}">Agregar nueva tarjeta</a>

<div class="mt-3">
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif
</div>

<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Número de tarjeta</th>
      <th>Banco</th>
      <th class="text-center">Acciones</th>
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
        <div class="d-flex justify-content-around">
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
