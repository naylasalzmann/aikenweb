@extends('layoutPdc')

@section('title', 'Guías')

@section('content')

  	<div class="row">
		<form action="{{ route('guias.index') }}">
			<div class="input-field col s3">
		      	<select id="titulo" name="titulo_id" class="titulo">
					<option value="" disabled selected>Título</option>
		        	@foreach ($titulos as $titulo)
						  <option value="{{ $titulo->id }}">{{ $titulo->descripcion }}</option>
		        	@endforeach
				</select>
			</div>

		    <div class="col s3">
			    <div class="row">
			        <div class="input-field col s12">
				        <input 
				          	type="text" 
				          	id="autocomplete-input" 
				          	name="localidad" 
				          	class="autocomplete" 
				          	value=""
				        >
				        <label for="autocomplete-input">Localidad</label>
			      	</div>
			    </div>
		    </div>
        

			<div class="col s12">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
				</button>
      		</div>
		</form>
	</div>

	<p>{{ $selectedTitulo ? $selectedTitulo->descripcion : '' }}</p>	
	<p>{{ $selectedLocalidad ? $selectedLocalidad->nombre : '' }}</p>	
	<h1>Guías</h1>

	<ul>
		@foreach ($guias as $guia)
		 	<li>
		 		<a href="/pdc/guias/{{ $guia->id }}">{{ $guia->nombre }} {{ $guia->apellido }}</a>
		 	</li>
		@endforeach	
	</ul>


<script type="text/javascript">
		
	const titulos = {!! json_encode($titulos->toArray()) !!};

	const titulosParaSelect =  titulos.reduce((obj, item) => {
  		obj[item['descripcion']] = null
  		return obj
	}, {}); 

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelector('.titulo');
    	const instances = M.FormSelect.init(elems, {data : titulosParaSelect});
	 
	});


	const selectTitulo = document.querySelector('.titulo');

	selectTitulo.addEventListener('change', (event) => {

		const result = document.querySelector('.result');

	});


	const localidades = {!! json_encode($localidades->toArray()) !!};

	options = localidades.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 


	document.addEventListener('DOMContentLoaded', function() {
		//onAutocomplete

    	var elems = document.querySelectorAll('.autocomplete');
    	var instances = M.Autocomplete.init(elems, { data: options });
  	});





</script>


@endsection