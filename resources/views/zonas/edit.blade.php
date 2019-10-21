@extends('layoutPdc')

@section('title', 'Editar zona')

@section('content')


<h3>Editar zona</h3>

<div class="row">
	<form method="POST" action="/pdc/zonas/{{ $zona->id }}">
			
		@method('PATCH')
		
		@csrf

        <div class="input-field col s12">
	      	<select id="localidad" name="localidad_id" class="localidad">
				<option value="{{ $zona->localidad->id }}">{{ $zona->localidad->nombre }}</option>
	        	@foreach ($localidades as $localidad)
					  <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
	        	@endforeach
			</select>
	      	<label for="localidad">Localidad</label>
	    </div>
        <div class="input-field col s12">
          	<input 
          		id="zona" 
          		name="nombre" 
          		type="text" 
          		value="{{ $zona->nombre }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="zona" class="active">Zona</label>
        </div>
      	<div class="col s2">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
			</button>
	     </div>

	</form>
	<form method="POST" action="/pdc/zonas/{{ $zona->id }}">
			
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


	const localidades = {!! json_encode($localidades->toArray()) !!};

	const localidadesParaSelect =  localidades.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.localidad');
    	const instances = M.FormSelect.init(elems, {data : localidadesParaSelect});
	 
	});

	const selectLocalidad = document.querySelector('.localidad');

	selectLocalidad.addEventListener('change', (event) => {

		const result = document.querySelector('.result');
	});

</script>


@endsection

