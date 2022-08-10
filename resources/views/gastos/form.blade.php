<h1>{{ $modo }} Gasto</h1>

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
  value="{{ isset($gasto->Nombre) ? $gasto->Nombre : old('Nombre') }}"
  >
<br>

<label for="Descripción">Descripción</label>
<input
  type="text"
  name="Descripcion"
  id="Descripción"
  value="{{ isset($gasto->Descripcion) ? $gasto->Descripcion : old('Descripcion') }}"
  >
<br>

<label for="Valor">Valor</label>
<input
  type="number"
  name="Valor"
  id="Valor"
  value="{{ isset($gasto->Valor) ? $gasto->Valor : old('Valor') }}"
  >
<br>

<a href="{{ url('/gastos') }}">Cancelar</a>
<input type="submit" value="{{ $modo }} Gasto">
<br>
