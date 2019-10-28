@extends('layoutPdc')

@section('title', 'Editar aventurero')

@section('content')

	<h3>Editar datos del aventurero</h3>

	<div class="row">
		<form method="POST" action="/pdc/aventureros/{{ $aventurero->id }}">
			
			@method('PATCH')

			@csrf

		    <div class="input-field col s6">
		        <input 
		          id="nombre" 
		          name="nombre" 
		          type="text" 
		          value="{{ $aventurero->nombre }}"
		          required
		          oninvalid="this.setCustomValidity('No olvides completar este campo.')"
		          oninput="this.setCustomValidity('')"                        
		          class="validate"
		        >
		        <label for="nombre" class="active">Nombre</label>
		    </div>
		    <div class="input-field col s6">
	          <input 
	            id="apellido" 
	            name="apellido" 
	            type="text" 
	            value="{{ $aventurero->apellido }}"
	            required
	            oninvalid="this.setCustomValidity('No olvides completar este campo.')"
	            oninput="this.setCustomValidity('')"                        
	            class="validate"
	          >
	          <label for="apellido" class="active">Apellido</label>
		    </div>
	       	<div class="input-field col s6">
			    <input 
			       id="identificacion" 
			       name="identificacion" 
			       type="text" 
			       value="{{ $aventurero->identificacion}}"
			    >
		    	<label for="identificacion">DNI o pasaporte</label>
			</div>
	        <div class="input-field col s6">
              <input 
                id="fechaNacimiento" 
                name="fecha_nacimiento" 
                type="date" 
                value="{{ $aventurero->fecha_nacimiento }}"
              >
              <label for="fechaNacimiento" class="active">Fecha de nacimiento</label>
	        </div>
	        <div class="input-field col s6">
		        <input 
		          id="direccion" 
		          name="direccion" 
		          type="text" 
		          value="{{ $aventurero->direccion }}"
		        >
		        <label for="direccion">Dirección</label>
	        </div>
		    <div class="input-field col s6">
		      <input 
		        id="telefono" 
		        name="telefono" 
		        type="text" 
		        value="{{ $aventurero->telefono }}"
		      >
		      <label for="telefono">Teléfono</label>
		    </div>
		    <div class="input-field col s12">
		      <input 
		        id="email" 
		        name="email" 
		        type="email" 
		        value="{{ $aventurero->email }}"
		      >
		      <label for="email">E-mail</label>
		    </div>
	      	<div class="col s2">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
				</button>
	      	</div>
		</form>
		<form method="POST" action="/pdc/aventureros/{{ $aventurero->id }}">
			
			@method('DELETE')	

			@csrf

	      	<div class="col s2">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Eliminar
				</button>
	      	</div>

	      	@include('errors')
		</form>
	</div>


@endsection
