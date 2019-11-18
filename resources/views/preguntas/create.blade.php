@extends('layouts.opcion')

@section('content')

  @if (session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif

  <div class="row">
    <div class="col-md-8 offset-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear pregunta</h3>
        </div>
        <div class="card-body">

          @if(isset($pregunta))
            <form enctype="multipart/form-data" action="{{ route('preguntas.update', $pregunta->id) }}" method="POST">
              <input type="hidden" name="_method" value="PATCH">
            @else
              <form enctype="multipart/form-data" action="{{ route('preguntas.store') }}" method="POST">
              @endif
              @csrf
              @if (count($subcategorias) == 0)
                <div class="alert alert-danger">
                  Agrega subcategorias para poder continuar
                </div>
              @endif
              <div class="form-group">
                <label class="form-label">Selecciona a que subcategoria pertenece</label>
                <select name="subcategoria_id" class="form-control">
                  @foreach($subcategorias as $sub)
                    <option value="{{ $sub->id }}" {{ isset($pregunta) && $pregunta->subcategoria_id == $sub->id ? 'selected' : '' }}>{{  $sub->nombre }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label class="form-label">Pregunta</label>
                <textarea name="pregunta" class="form-control  @error('pregunta') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Pregunta completa">{{ isset($pregunta) ? $pregunta->pregunta : old('pregunta') }}</textarea>
                @error('pregunta')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <label class="form-label">Imagen</label>
              <div class="form-group">
                <input type="file" name="image" class="@error('opc1') is-invalid @enderror" >
                {{-- {{ Form::file('image',['class' => ' form-control']) }} --}}
                @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label">Opcion 1</label>
                <input type="text" class="form-control  @error('opc1') is-invalid @enderror" name="opc1" value="{{ isset($pregunta) ? $pregunta->opcion1 : old('opc1') }}" placeholder="Opcion 1 de la pregunta...">
                @error('opc1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label">Opcion 2</label>
                <input type="text" class="form-control  @error('opc2') is-invalid @enderror" name="opc2" value="{{ isset($pregunta) ? $pregunta->opcion2 : old('opc2') }}" placeholder="Opcion 2 de la pregunta...">
                @error('opc2')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Opcion 3</label>
                <input type="text" class="form-control  @error('opc3') is-invalid @enderror" name="opc3" value="{{ isset($pregunta) ? $pregunta->opcion3 :  old('opc3') }}" placeholder="Opcion 3 de la pregunta...">
                @error('opc3')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Respuesta</label>
                <input type="text" class="form-control  @error('resp') is-invalid @enderror" name="resp" value="{{ isset($pregunta) ? $pregunta->respuesta :  old('resp') }}" placeholder="Respuesta correcta de la pregunta...">
                @error('resp')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary ml-auto" onclick="disableButton(this)">Aceptar</button>

            </form>

          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/doubleForm.js') }}"></script>

<script type="text/javascript">
  function cerrar(){
    const modal = document.getElementById('my-modal');
    modal.style.display = 'none';
  }
</script>
  @endsection
