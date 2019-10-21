@extends('layoutPdc')

@section('title', 'Crear localidad')

@section('content')


<h3>Crea una nueva localidad</h3>

<div class="row">
	<form method="POST" action="/pdc/localidades">
		
		@csrf

	    <div class="input-field col s12">
	      	<select id="pais" name="pais_id" class="pais" disabled>
				<option value="" disabled selected>Argentina</option>
	        	@foreach ($paises as $pais)
					  <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
	        	@endforeach
			</select>
	      	<label for="pais">País</label>
	    </div>
        <div class="input-field col s12">
	      	<select id="provincia" name="provincia_id" class="provincia validate" required>
				<option value="" disabled selected>Seleccione</option>
	        	@foreach ($provincias as $provincia)
					  <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
	        	@endforeach
			</select>
	      	<label for="provincia">Provincia</label>
	    </div>
        <div class="input-field col s12">
          	<input 
          		id="localidad" 
          		name="nombre" 
          		type="text" 
          		value="{{ old('nombre') }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="localidad">Localidad</label>
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

	const paises = {!! json_encode($paises->toArray()) !!};

	const paisesParaSelect =  paises.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.pais');
    	const instances = M.FormSelect.init(elems, {data : paisesParaSelect});
	 
	});

	/* 
	TODO: usar esto para hacer estos selects dependientes

	const selectPais = document.querySelector('.pais');

	selectPais.addEventListener('change', (event) => {

		const result = document.querySelector('.result');

	}); */



	const provincias = {!! json_encode($provincias->toArray()) !!};

	const provinciasParaSelect =  provincias.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.provincia');
    	const instances = M.FormSelect.init(elems, {data : provinciasParaSelect});
	 
	});

	const selectProvincia = document.querySelector('.provincia');

	selectProvincia.addEventListener('change', (event) => {

		const result = document.querySelector('.result');
	});




</script>

@endsection

