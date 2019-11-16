@extends('layoutPdc')

@section('title', 'Zonas')

@section('content')

	
	<h1>Zonas</h1>

	<ul>
		@foreach ($zonas as $zona)
		 	<li>
		 		<a href="/pdc/zonas/{{ $zona->id }}">{{ $zona->nombre }}, {{ $zona->localidad->nombre }}</a>
		 	</li>
		@endforeach	
	</ul>

	<div class="fixed-action-btn">
		<a href="{{ route('zonas.create') }}" class="btn-floating btn-large waves-effect waves-light teal">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection