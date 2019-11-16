@extends('layoutPdc')

@section('title', 'Editar guía')

@section('content')

	<h3>Editar guía</h3>

	<div class="row">
		<form method="POST" action="/pdc/guias/{{ $guia->id }}">
			
			@method('PATCH')

			@csrf

      		<div class="input-field col s6">
	          	<input 
      				id="nombre" 
      				name="nombre" 
		      		type="text" 
		      		value="{{ $guia->nombre }}"
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
		      		value="{{ $guia->apellido }}"
				    required
				    oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				    oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
  				>
  				<label for="apellido" class="active">Apellido</label>
			</div>
			<div class="input-field col s6">
    			<select id="titulo" name="titulo_id" class="titulo">
 				   	<option value="{{ $guia->titulo_id }}">{{ $guia->titulo->descripcion ?? ''}}</option>
        	 		@foreach ($titulos as $titulo)
  				    	<option value="{{ $titulo->id }}">{{ $titulo->descripcion }}</option>
        	 		@endforeach
	   			</select>
   				<label for="titulo">Título</label>
  		 	</div>
  		 	<div class="input-field col s6">
		      	<input 
		      		id="identificacion" 
		      		name="identificacion" 
		      		type="text" 
		      		value="{{ $guia->identificacion }}"
				    required
				    oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				    oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="identificacion" class="active">DNI o pasaporte</label>
   			</div>
		    <div class="input-field col s6">
		      	<input 
		      		id="fechaNacimiento" 
		      		name="fechaNacimiento" 
		      		type="date" 
		      		value="{{ $guia->fechaNacimiento }}"
				    required
				    oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				    oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="fechaNacimiento" class="active">Fecha de nacimiento</label>
		    </div>
		    <div class="input-field col s6">
			    <select id="localidad" name="localidad_id" class="localidad">
	   				<option value="{{ $guia->localidad_id }}">{{ $guia->localidad->nombre }}
	   				</option>
		        	@foreach ($localidades as $localidad)
	    				  <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
		        	@endforeach
				</select>
		      	<label for="localidad">Localidad</label>
			 </div>
		    <div class="input-field col s6">
		    	<input 
		    	  id="direccion" 
		    		name="direccion" 
		    		type="text" 
		    		value="{{ $guia->direccion }}"
			      	required
			      	oninvalid="this.setCustomValidity('No olvides completar este campo.')"
			      	oninput="this.setCustomValidity('')"  				          		
		    		class="validate"
		    	>
		    	<label for="direccion" class="active">Dirección</label>
		    </div>
		    <div class="input-field col s6">
		      	<input 
		      		id="telefono" 
		      		name="telefono" 
		      		type="text" 
		      		value="{{ $guia->telefono }}"
		  	      	required
		  	      	oninvalid="this.setCustomValidity('No olvides completar este campo.')"
		  	      	oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="telefono" class="active">Teléfono</label>
		    </div>
		    <div class="input-field col s12">
		      	<input 
		      		id="email" 
		      		name="email" 
		      		type="email" 
		      		value="{{ $guia->email }}"
			  	    required
			  	    oninvalid="this.setCustomValidity('No olvides completar este campo.')"
			  	    oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="email" class="active">E-mail</label>
		    </div>

  
      	<div class="col s2">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
      		</button>
      	</div>
	</form>
	<form method="POST" action="/pdc/guias/{{ $guia->id }}">
		
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
<script type="text/javascript">

  	const titulos = {!! json_encode($titulos->toArray()) !!}
    const localidades = {!! json_encode($localidades->toArray()) !!}

  	const titulosParaAutocomplete =  titulos.reduce((obj, item) => {
  		obj[item['descripcion']] = null
  		return obj
	}, {});

	const localidadesParaAutocomplete =  localidades.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 


	document.addEventListener('DOMContentLoaded', function() {
    	const elems = document.querySelector('.titulo');
    	const instances2 = M.FormSelect.init(elems, {data : titulosParaAutocomplete});	
    	
  	});

	document.addEventListener('DOMContentLoaded', function() {
    	const elems = document.querySelector('.localidad');
    	const instances = M.FormSelect.init(elems, {data : localidadesParaAutocomplete});
	    	
	 });


    const selectLocalidad = document.querySelector('.localidad');

  	selectLocalidad.addEventListener('change', (event) => {
  		const result = document.querySelector('.result');
  		console.log('loc', event.target.value);


  	})

    const selectElement = document.querySelector('.titulo');

	selectElement.addEventListener('change', (event) => {
			const result = document.querySelector('.result');
			console.log(event.target.value);
	});



</script>

@endsection
