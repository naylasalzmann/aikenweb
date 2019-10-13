@extends('layoutPdc')

@section('title', 'Editar título')

@section('content')

	<h3>Editar título</h3>

	<div class="row">
		<form method="POST" action="/pdc/titulos/{{ $titulo->id }}">
			
			@method('PATCH')

			@csrf

	        <div class="input-field col s12">
	          	<input 
	          		id="titulo" 
	          		name="descripcion" 
	          		type="text" 
	          		class="validate" 
	          		value="{{ $titulo->descripcion }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')" 
	          	>
	          	<label for="titulo" class="active">Título</label>
	        </div>
	      	<div class="col s2">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
				</button>
	      	</div>
		</form>
		<form method="POST" action="/pdc/titulos/{{ $titulo->id }}">
			
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
