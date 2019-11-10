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
    

		<div class="input-field col s3">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
			</button>
  		</div>
	</form>
</div>

<p>{{ $selectedTitulo ? $selectedTitulo->descripcion : '' }}</p>	
<p>{{ $selectedLocalidad ? $selectedLocalidad->nombre : '' }}</p>	


<div class="row">
	<div class="col s11" id="print">
		<h3>Guías</h3>
		<ul>
		 	<table >
			    <thead>
			      <tr>
			          <th>Nombre</th>
			          <th>Apellido</th>
			          <th>DNI</th>
			          <th>Fecha de nacimiento</th>
			          <th>Teléfono</th>
			          <th>Email</th>
			      </tr>
			    </thead>	

	    		<tbody>
				@foreach ($guias as $guia)
		          	<tr>
		            <td>{{ $guia->nombre }}</td>
		            <td>{{ $guia->apellido }}</td>
		            <td>{{ $guia->identificacion }}</td>
		            <td>{{ $guia->fechaNacimiento }}</td>
		            <td>{{ $guia->telefono }}</td>
		            <td>{{ $guia->email }}</td>
		            <td>
		            	<a href="/pdc/guias/{{ $guia->id }}">Ver</a>
		            </td>
		          </tr>
				@endforeach	
	        </tbody>
	      </table>
		</ul>
	</div>
	<div class="col s1" id="print">
		<a href="" onClick="printData()" target="_blank" class="teal-text">
			<i class="material-icons">print</i>
		</a>
	</div>


</div>

<div class="row">	
	<div id="print2" class="col s11">
		
		<h6>Salidas asignadas a cada guía</h6>

		 @foreach ($guias as $guia)
		 	<div><b>{{ $guia->nombre }} {{ $guia->apellido }}</b></div>
		 	@foreach ($guia->salidas as $salida)
		 		<div>{{ $salida->titulo }}</div>
		 	@endforeach
		 @endforeach
	</div>
	<div class="col s1" id="print">
			<a href="" onClick="print2()" target="_blank" class="teal-text">
				<i class="material-icons">print</i>
			</a>
	</div>
</div>

@endsection

@section('scripts')
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

	function print2() {
        const divToPrint=document.getElementById("print2");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }



</script>

@endsection