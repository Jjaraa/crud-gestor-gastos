@extends('layouts.app')
@section('content')


<div class="container responsive-container">

<form action="{{ url('/gastos') }}" method="post" entrype="multipart/form-data" >
@csrf
@include('gastos.form', ['modo' => 'Crear'])

</form>

</div>
@endsection
