@extends('layoutPdc')

@section('title', 'Editar condiciones')

@section('content')

	<h3>Editar condiciones</h3>

	<div class="row">
		<form method="POST" action="/pdc/condiciones/{{ $condicion->id }}">
			
			@method('PATCH')

			@csrf

			<div class="input-field col s12">
	          	<input 
	          		id="titulo" 
	          		name="titulo" 
	          		type="text" 
		          	value="{{ $condicion->titulo }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')"  				          		
	          		class="validate"
	          	>
          		<label for="titulo" class="active">Título</label>
	        </div>
	        <div class="input-field col s12">
		    	<textarea 
		    	 	id="descripcion"
		      		name="descripcion"  
					required
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')"  				          		
		    	 	class="materialize-textarea validate"
		    	>{{ $condicion->descripcion }}</textarea>
	          	<label for="descripcion" class="active">Descripción</label>
	        </div>

	      	<div class="col s2">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
				</button>
	      	</div>
		</form>
		<form method="POST" action="/pdc/condiciones/{{ $condicion->id }}">
			
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


@endsection
