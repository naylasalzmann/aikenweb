@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	<div class="container">
		
		 <div class="row">
	  		<div class="col s3">
	      		
	  		</div>
	      	<div class="col s9">
	    		<h3>Editar tipo de salida</h3>

    			<div class="row">
    				<form method="POST" action="/pdc/tiposSalida/{{ $tipo->id }}">
    					
    					@method('PATCH')

    					@csrf

				        <div class="input-field col s12">
				          	<input 
				          		id="tipoSalida" 
				          		name="descripcion" 
				          		type="text" 
				          		class="validate" 
				          		value="{{ $tipo->descripcion }}"
								required
								oninvalid="this.setCustomValidity('No olvides completar este campo.')"
    							oninput="this.setCustomValidity('')" 
				          	>
				          	<label for="tipoSalida" class="active">Tipo de salida</label>
				        </div>
				      	<div class="col s2">
				      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
							</button>
				      	</div>
    				</form>
    				<form method="POST" action="/pdc/tiposSalida/{{ $tipo->id }}">
    					
    					@method('DELETE')	

    					@csrf

				      	<div class="col s2">
				      		<button class="btn waves-effect waves-light" type="submit" name="action">Eliminar
							</button>
				      	</div>

				      	<div class="col s12">
					      	@if ($errors->any())

					      		<div class="alert is-danger">
					      			<ul>
					      				@foreach ($errors->all() as $error)
					      					<li class="card-panel red darken-2 white-text"> {{ $error }} </li>
					      				@endforeach
					      			</ul>
					      		</div>

					      	@endif
				      	</div>
    				</form>
  				</div>
	    	</div>
	    </div>
	</div>

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

@endsection
