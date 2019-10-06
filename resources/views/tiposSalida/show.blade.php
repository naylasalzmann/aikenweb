@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	<div class="container">
		
		 <div class="row">
	  		<div class="col s3">
	      		@section('sidenav')
	      		@endsection
	  		</div>
	      	<div class="col s9">
	    		<h1> {{ $tipo->descripcion }} </h1>

	    		<p>
	    			<a href="/pdc/tiposSalida/{{ $tipo->id }}/edit">Editar</a>
	    		</p>
	    	</div>
	    </div>
	</div>

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

@endsection