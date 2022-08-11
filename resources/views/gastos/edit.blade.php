@extends('layouts.app')
@section('content')

<div class="container responsive-container">

<form
  action="{{ url('/gastos/'.$gasto->id) }}"
  method="post"
  >
    @csrf
    {{ method_field('PATCH') }}
    @include('gastos.form', ['modo' => 'Editar'])
</form>

</div>
@endsection
