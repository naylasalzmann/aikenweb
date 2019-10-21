@extends('layoutPdc')

@section('title', 'Registrar guía')

@section('content')


<h3>Registra un nuevo guía</h3>

<div class="row">
	<form method="POST" action="/pdc/guias">
		
		@csrf

    <div class="input-field col s6">
      	<input 
      		id="nombre" 
      		name="nombre" 
      		type="text" 
      		value="{{ old('nombre') }}"
		      required
		      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
		      oninput="this.setCustomValidity('')"  				          		
      		class="validate"
      	>
      	<label for="nombre">Nombre</label>
    </div>
    <div class="input-field col s6">
      	<input 
      		id="apellido" 
      		name="apellido" 
      		type="text" 
      		value="{{ old('apellido') }}"
		      required
		      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
		      oninput="this.setCustomValidity('')"  				          		
      		class="validate"
      	>
      	<label for="apellido">Apellido</label>
    </div>
    <div class="input-field col s6">
        <select id="titulo" name="titulo_id" class="titulo">
 				   <option value="">No presenta</option>
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
      		value="{{ old('identificacion') }}"
		      required
		      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
		      oninput="this.setCustomValidity('')"  				          		
      		class="validate"
      	>
      	<label for="identificacion">DNI o pasaporte</label>
    </div>
    <div class="input-field col s6">
      	<input 
      		id="fechaNacimiento" 
      		name="fechaNacimiento" 
      		type="date" 
      		value="{{ old('fechaNacimiento') }}"
		      required
		      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
		      oninput="this.setCustomValidity('')"  				          		
      		class="validate"
      	>
      	<label for="fechaNacimiento" class="active">Fecha de nacimiento</label>
    </div>
    <div class="input-field col s6">
	      <select 
          id="localidad" 
          name="localidad_id" 
          required 
          class="localidad validate"
        >
   				  <option value="" disabled selected>Seleccione</option>
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
    		value="{{ old('direccion') }}"
	      required
	      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
	      oninput="this.setCustomValidity('')"  				          		
    		class="validate"
    	>
    	<label for="direccion">Dirección</label>
    </div>
    <div class="input-field col s6">
      	<input 
      		id="telefono" 
      		name="telefono" 
      		type="text" 
      		value="{{ old('telefono') }}"
  	      required
  	      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
  	      oninput="this.setCustomValidity('')"  				          		
      		class="validate"
      	>
      	<label for="telefono">Teléfono</label>
    </div>
    <div class="input-field col s6">
      	<input 
      		id="email" 
      		name="email" 
      		type="email" 
      		value="{{ old('email') }}"
  	      required
  	      oninvalid="this.setCustomValidity('No olvides completar este campo.')"
  	      oninput="this.setCustomValidity('')"  				          		
      		class="validate"
      	>
      	<label for="email">E-mail</label>
    </div>
    <div class="col s12">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    		   <i class="material-icons right">send</i>
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

