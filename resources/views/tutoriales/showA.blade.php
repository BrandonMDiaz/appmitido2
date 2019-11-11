
@extends('layouts.opcion')

@section('content')

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

    <div class="tut-show">
      <div class="tut-text">
        <div class="tut-titulo">
          <p>
            {{$tutorial->titulo}}
          </p>
        </div>
        <div class="tut-body">
          {!!$tutorial->texto!!}
        </div>
      </div>
    </div>
  </div>

@endsection
