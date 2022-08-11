@extends('layouts.app')
@section('content')

<div class="container">

<form
  action="{{ url('/tarjetas/'.$tarjeta->id) }}"
  method="post"
  >
    @csrf
    {{ method_field('PATCH') }}
    @include('tarjetas.form', ['modo' => 'Editar'])
</form>

</div>
@endsection
