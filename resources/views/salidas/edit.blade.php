@extends('layoutPdc')

@section('title', 'Editar salida')

@section('content')

	<h3>Editar salida</h3>

	<div class="row">
		<form method="POST" action="/pdc/salidas/{{ $salida->id }}">
			
			@method('PATCH')

			@csrf

	        <div class="input-field col s6">
		      	<select id="tipo" name="tipo_id" class="tipo" required>
					<option value="{{ $salida->tipo_id }}">{{ $salida->tipo->descripcion }}
					</option>
		        	@foreach ($tipos as $tipo)
						  <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
		        	@endforeach
				</select>
		      	<label for="tipo">Tipo de salida</label>
	    	</div>
		    <div class="input-field col s6">
		      	<select id="condicion" name="condicion_id" class="condicion validate" required>
					<option value="{{ $salida->condicion_id }}">{{ $salida->condicion->titulo }}
					</option>
		        	@foreach ($condiciones as $condicion)
						  <option value="{{ $condicion->id }}">{{ $condicion->titulo }}</option>
		        	@endforeach
				</select>
		      	<label for="condicion">Condiciones para reservar</label>
		    </div>
	    	<div class="input-field col s6">
		      	<select id="zona" name="zona_id" class="zona validate" required>
					<option value="{{ $salida->zona_id }}">{{ $salida->zona->nombre }}</option>
		        	@foreach ($zonas as $zona)
						  <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
		        	@endforeach
				</select>
	      		<label for="zona">Zona</label>
	    	</div>
		    <div class="input-field col s6">
		      	<input 
		      		id="titulo" 
		      		name="titulo" 
		      		type="text" 
		      		value="{{ $salida->titulo }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="titulo" class="active">Título</label>
		    </div>
		    <div class="input-field col s12">
		      	<input 
		      		id="subtitulo" 
		      		name="subtitulo" 
		      		type="text" 
		      		value="{{ $salida->subtitulo }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="subtitulo" class="active">Subtítulo</label>
		    </div>
		    <div class="input-field col s12">
		    	 <textarea 
		      	 	id="descripcion"
		        	name="descripcion"  
						required
						oninvalid="this.setCustomValidity('No olvides completar este campo.')"
						oninput="this.setCustomValidity('')"  				          		
		      	 	class="materialize-textarea validate"
		    	 >{{ $salida->descripcion }}</textarea>
		      	<label for="descripcion" class="active">Descripción</label>
		    </div>
		    <div class="input-field col s4">
		      	<input 
		      		id="precio" 
		      		name="precio" 
		      		type="number" 
		      		min="1"
		      		value="{{ $salida->precio }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar con un valor numérico positivo este campo.')"
					oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="precio">Precio</label>
		    </div>
		    <div class="input-field col s4">
		      	<input 
		      		id="cupo_minimo" 
		      		name="cupo_minimo" 
		      		type="number"
		      		min="1" 
		      		value="{{ $salida->cupo_minimo }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar con un valor numérico positivo este campo.')"
					oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="cupo_minimo">Cupo mínimo</label>
		    </div>
		    <div class="input-field col s4">
		      	<input 
		      		id="cupo_maximo" 
		      		name="cupo_maximo" 
		      		type="number" 
		      		min="1"
		      		value="{{ $salida->cupo_maximo }}"
					required
					oninvalid="this.setCustomValidity('No olvides completar con un valor numérico positivo este campo.')"
					oninput="this.setCustomValidity('')"  				          		
		      		class="validate"
		      	>
		      	<label for="cupo_maximo">Cupo máximo</label>
		    </div>

		    <div class="input-field col s12">
			    <select multiple id="guiasSelect" class="guias" name="guiasSelect" onChange="getSelectedValues()">
			      <option disabled value>@foreach ($salida->guias as $guia){{ $guia->nombre }} {{ $guia->apellido }}, @endforeach
			      </option>
			      	@foreach ($guias as $guia)
						  <option value="{{ $guia->id }}">{{ $guia->nombre }} {{ $guia->apellido }}</option>
		        	@endforeach
			    </select>
			    <label>Guías</label>
			</div>
			<div class="input-field col s12">
	            <input 
	                name="guias" 
	                type="hidden" 
	                value=""
	             >
	        </div>

	      	<div class="col s2">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
				</button>
	      	</div>
	</form>
	<form method="POST" action="/pdc/salidas/{{ $salida->id }}">
			
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

@section('scripts')
	<script type="text/javascript">

	const tipos = {!! json_encode($tipos->toArray()) !!};

	const tiposParaSelect =  tipos.reduce((obj, item) => {
  		obj[item['descripcion']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.tipo');
    	const instances = M.FormSelect.init(elems, {data : tiposParaSelect});
	 
	});

	

	const selectTipo = document.querySelector('.tipo');

	selectTipo.addEventListener('change', (event) => {

		const result = document.querySelector('.result');

	});



	const condiciones = {!! json_encode($condiciones->toArray()) !!};

	const condicionesParaSelect =  condiciones.reduce((obj, item) => {
  		obj[item['titulo']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.condicion');
    	const instances = M.FormSelect.init(elems, {data : condicionesParaSelect});
	 
	});

	const selectCondicion = document.querySelector('.condicion');

	selectCondicion.addEventListener('change', (event) => {

		const result = document.querySelector('.result');
	});


	const zonas = {!! json_encode($zonas->toArray()) !!};

	const zonasParaSelect =  zonas.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.zona');
    	const instances = M.FormSelect.init(elems, {data : zonasParaSelect});
	 
	});

	const selectZona = document.querySelector('.zona');

	selectZona.addEventListener('change', (event) => {

		const result = document.querySelector('.result');
	});




	const guias = {!! json_encode($guias->toArray()) !!};

	const guiasParaSelect =  guias.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 

	const elems = document.querySelector('.guias');
	const inst = M.FormSelect.init(elems, {data : guiasParaSelect});
  	function getSelectedValues() {

   		console.log(inst.getSelectedValues()); 

        document.getElementsByName('guias')[0].value = JSON.stringify(inst.getSelectedValues());

        console.log(document.getElementsByName('guias')[0].value);

   	}

</script>
@endsection
