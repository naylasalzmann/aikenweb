@extends('layoutPdc')

@section('title', 'Editar localidad')

@section('content')


<h3>Editar localidad</h3>

<div class="row">
	<form method="POST" action="/pdc/localidades/{{ $localidad->id }}">
			
		@method('PATCH')
		
		@csrf

        <div class="input-field col s12">
	      	<select id="provincia" name="provincia_id" class="provincia">
				<option value="{{ $localidad->provincia->id }}">{{ $localidad->provincia->nombre }}</option>
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
          		value="{{ $localidad->nombre }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="localidad" class="active">Localidad</label>
        </div>
      	<div class="col s2">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
			</button>
	     </div>

	</form>
	<form method="POST" action="/pdc/localidades/{{ $localidad->id }}">
			
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
		console.log('loc', event.target.value);

	});




</script>

@endsection

