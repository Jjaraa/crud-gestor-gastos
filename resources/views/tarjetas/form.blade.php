<h1 class="text-center mb-4">{{ $modo }} Tarjeta</h1>

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
  class="form-control"
  type="text"
  name="Nombre"
  id="Nombre"
  value="{{ isset($tarjeta->Nombre) ? $tarjeta->Nombre : old('Nombre') }}"
  >
<br>

<label for="Numero">Número de tarjeta</label>
<input
  class="form-control"
  type="text"
  name="Numero"
  id="Numero"
  value="{{ isset($tarjeta->Numero) ? $tarjeta->Numero : old('Numero') }}"
  >
<br>

<label for="Banco">Banco</label>
<input
  class="form-control"
  type="text"
  name="Banco"
  id="Banco"
  value="{{ isset($tarjeta->Banco) ? $tarjeta->Banco : old('Banco') }}"
  >
<br>

<div class="text-center mt-2">
  <a
    class="btn btn-secondary"
    href="{{ url('/tarjetas') }}"
    >
    Cancelar</a>

  <input
    class="btn btn-primary"
    type="submit"
    value="{{ $modo }} Tarjeta"
    >
  <br>
</div>
