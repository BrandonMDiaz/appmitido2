@extends('layouts.opcion')

@section('content')

	<div class="tutoriales">
		<div class="header-tutoriales subtitulo">
			<h1>Tutoriales</h1>
			<p>Escoge un tutorial para que comiences a mejorar tus conocimientos.</p>
		</div>
		@foreach ($subcategorias as $sub)
			<div class="categoria">
				<div class="categoria-tut-container">
					<div class="categoria-titulo">
						<h3>
							<i class="fas icon-large fa-university"></i>
						</h3>
						<h4>{{$sub->nombre}}</h4>
					</div>
					<ul class="catego-tut">
						@foreach ($sub->tutoriales as $tut)
							<li class="categoria-tutorial">
								<a href="{{route('tutorialA.show', $tut->id)}}">
									{{$tut->titulo}}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>

		@endforeach
	</div>

	<div class="centrar" style="margin-top:20px;">
		{{ $subcategorias->links() }}
	</div>

@endsection
