@extends('layoutPdc')

@section('title', 'Títulos')

@section('content')

	
	<h1>Estos son tus títulos</h1>

	<ul>
		@foreach ($titulos as $titulo)
		 	<li>
		 		<a href="/pdc/titulos/{{ $titulo->id }}">{{ $titulo->descripcion }}</a>
		 	</li>
		@endforeach	
	</ul>

	<div class="fixed-action-btn">
		<a href="{{ route('titulos.create') }}" class="btn-floating btn-large waves-effect waves-light teal">
			<i class="material-icons">add</i>
		</a>
	</div>
      
@endsection
