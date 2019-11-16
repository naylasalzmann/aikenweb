@extends('layoutPdc')

@section('title', 'Tipos de salida')

@section('content')

	
	<h1>Estos son tus tipos de salida</h1>

	<ul>
		@foreach ($tipos as $tipo)
		 	<li>
		 		<a href="/pdc/tiposSalida/{{ $tipo->id }}">{{ $tipo->descripcion }}</a>
		 	</li>
		@endforeach	
	</ul>

	<div class="fixed-action-btn">
		<a href="{{ route('tiposSalida.create') }}" class="btn-floating btn-large waves-effect waves-light teal">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection

