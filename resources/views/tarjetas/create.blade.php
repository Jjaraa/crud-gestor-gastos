@extends('layouts.app')
@section('content')

<div class="container">

<form action="{{ url('/tarjetas') }}" method="post" entrype="multipart/form-data" >
@csrf
@include('tarjetas.form', ['modo' => 'Crear'])

</form>

</div>
@endsection
