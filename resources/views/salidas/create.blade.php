@extends('layoutPdc')

@section('title', 'Crear salida')

@section('content')


<h3>Crea una nueva salida</h3>

<div class="row">
	<form method="POST" action="/pdc/salidas">
		
		@csrf

	    <div class="input-field col s6">
	      	<select id="tipo" name="tipo_id" class="tipo" required>
				<option value="" disabled selected>Seleccione</option>
	        	@foreach ($tipos as $tipo)
					  <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
	        	@endforeach
			</select>
	      	<label for="tipo">Tipo de salida</label>
	    </div>
        <div class="input-field col s6">
	      	<select id="condicion" name="condicion_id" class="condicion validate" required>
				<option value="" disabled selected>Seleccione</option>
	        	@foreach ($condiciones as $condicion)
					  <option value="{{ $condicion->id }}">{{ $condicion->titulo }}</option>
	        	@endforeach
			</select>
	      	<label for="condicion">Condiciones para reservar</label>
	    </div>
	    <div class="input-field col s6">
	      	<select id="zona" name="zona_id" class="zona validate" required>
				<option value="" disabled selected>Seleccione</option>
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
          		value="{{ old('titulo') }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="titulo">Título</label>
        </div>
        <div class="input-field col s12">
          	<input 
          		id="subtitulo" 
          		name="subtitulo" 
          		type="text" 
          		value="{{ old('subtitulo') }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="subtitulo">Subtítulo</label>
        </div>
        <div class="input-field col s12">
        	 <textarea 
          	 	id="descripcion"
            	name="descripcion"  
      				required
      				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
      				oninput="this.setCustomValidity('')"  				          		
          	 	class="materialize-textarea validate"
        	 >{{ old('descripcion') }}</textarea>
          	<label for="descripcion">Descripción</label>
        </div>
        <div class="input-field col s4">
          	<input 
          		id="precio" 
          		name="precio" 
          		type="number" 
          		min="1"
          		value="{{ old('precio') }}"
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
          		value="{{ old('cupo_minimo') }}"
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
          		value="{{ old('cupo_maximo') }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar con un valor numérico positivo este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="cupo_maximo">Cupo máximo</label>
        </div>
        <div class="input-field col s12">
		    <select multiple id="guias" class="guias" name="guiasSelect" onChange="getSelectedValues()">
		      <option value="" disabled selected>Guías: </option>
		      	@foreach ($guias as $guia)
					  <option value="{{ $guia->id }}">{{ $guia->nombre }} {{ $guia->apellido }}</option>
	        	@endforeach
		    </select>
		    <label>Guías</label>
		</div>
		<div class="input-field col s12">
            <input 
                id="guias" 
                name="guias" 
                type="hidden" 
                value="{{ 0 }}" 
             >
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