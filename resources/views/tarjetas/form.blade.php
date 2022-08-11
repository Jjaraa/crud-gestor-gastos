<h1>{{ $modo }} Tarjeta</h1>

@if(count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
      <li>
      {{ $error }}
      </li>
    @endforeach
    </ul>
  </div>
@endif

<label for="Nombre">Nombre</label>
<input
  type="text"
  name="Nombre"
  id="Nombre"
  value="{{ isset($tarjeta->Nombre) ? $tarjeta->Nombre : old('Nombre') }}"
  >
<br>

<label for="Numero">Número de tarjeta</label>
<input
  type="text"
  name="Numero"
  id="Numero"
  value="{{ isset($tarjeta->Numero) ? $tarjeta->Numero : old('Numero') }}"
  >
<br>

<label for="Banco">Banco</label>
<input
  type="text"
  name="Banco"
  id="Banco"
  value="{{ isset($tarjeta->Banco) ? $tarjeta->Banco : old('Banco') }}"
  >
<br>

<a href="{{ url('/tarjetas') }}">Cancelar</a>
<input type="submit" value="{{ $modo }} Tarjeta">
<br>
