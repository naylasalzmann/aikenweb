@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	<h1>Localidades</h1>

	<ul>
		@foreach ($localidades as $localidad)
		 	<li>
		 		<a href="/pdc/localidades/{{ $localidad->id }}">
		 			{{ $localidad->nombre }}, {{ $localidad->provincia->nombre }}
		 		</a>
		 	</li>
		@endforeach	
	</ul>

	<div class="fixed-action-btn">
		<a href="{{ route('localidades.create') }}" class="btn-floating btn-large waves-effect waves-light teal">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection
