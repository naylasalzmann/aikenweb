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
	    		<h1>Estos son tus tipos de salida</h1>

	    		<ul>
		    		@foreach ($tipos as $tipo)
		    		 	<li>
		    		 		<a href="/pdc/tiposSalida/{{ $tipo->id }}">{{ $tipo->descripcion }}</a>
		    		 	</li>
		    		@endforeach	
	    		</ul>
	    	</div>
	    </div>
	</div>

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

@endsection

