@extends('layoutPdc')

@section('title', 'Salidas')

@section('content')

	
	<div class="row">
		<form action="{{ route('salidas.index') }}">
			<div class="input-field col s3">
		      	<select id="tipo" name="tipo_id" class="tipo">
					<option value="" disabled selected>Tipo</option>
		        	@foreach ($tipos as $tipo)
						  <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
		        	@endforeach
				</select>
			</div>

			 <div class="col s6">
		        <div class="input-field col s12">
			        <input 
			          	type="text" 
			          	id="autocomplete-input" 
			          	name="zona" 
			          	class="autocomplete" 
			          	value=""
			        >
			        <label for="autocomplete-input">Zona</label>
		      	</div>
		    </div>

			<div class="input-field col s3">
		      	<select id="mes" name="mes" class="meses">
					<option value="" disabled selected>Mes</option>
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
			</div>


			<div class="col s12">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
				</button>
      		</div>
		</form>
	</div>

	<p>{{ $selectedTipo ? $selectedTipo->descripcion : '' }}</p>
	<p>{{ $selectedZona ? $selectedZona->nombre : '' }}</p>
	<h1>Salidas</h1>

	<ul>
		@foreach ($salidas as $salida)
		 	<li>
		 		<a href="/pdc/salidas/{{ $salida->id }}">
		 			{{ $salida->titulo }}
		 		</a>
		 		<p>
		 			{{ $salida->subtitulo }}
		 		</p>
		 	</li>
		@endforeach	
	</ul>

<div class="fixed-action-btn">
	<a href="{{ route('salidas.create') }}" class="btn-floating btn-large waves-effect waves-light teal">
		<i class="material-icons">add</i>
	</a>
</div>


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


	const zonas = {!! json_encode($zonas->toArray()) !!};

	options = zonas.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 

	console.log('options', options);
	document.addEventListener('DOMContentLoaded', function() {

    	var elems = document.querySelectorAll('.autocomplete');
    	var instances = M.Autocomplete.init(elems, { data: options });
  	});



 

  	/*const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", 
  	"Octubre", "Noviembre", "Diciembre"];

	options = meses.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); */


	const meses = {
		"Enero": null,
		"Febrero": null,
		"Marzo": null,
		"Abril": null,
		"Mayo": null,
		"Junio": null,
		"Julio": null,
		"Agosto": null,
		"Septiembre": null,
		"Octubre": null,
		"Noviembre": null,
		"Diciembre": null,
	}

	document.addEventListener('DOMContentLoaded', function() {
    	var elems = document.querySelectorAll('.meses');
    	var instances = M.FormSelect.init(elems, { data: meses });
  	});

</script>


@endsection

