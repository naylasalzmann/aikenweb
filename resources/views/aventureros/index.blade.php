@extends('layoutPdc')

@section('title', 'Aventureros')

@section('content')

	<div class="row">
		
		<form action="{{ route('aventureros.index') }}">
			<div class="col s6">	
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
		
			<div class="input-field col s6">
		  		<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
				</button>
			</div>
		</form>
	</div>
	<p>{{ $selectedLocalidad->nombre ?? '' }}</p>

	<h1>Aventureros de Aiken</h1>

	<ul>
	 	<table>
		    <thead>
		      <tr>
		          <th>Nombre</th>
		          <th>Apellido</th>
		          <th>DNI</th>
		          <th>Edad</th>
		          <th>Teléfono</th>
		          <th>Email</th>
		      </tr>
		    </thead>	

    		<tbody>
			@foreach ($aventureros as $aventurero)
	          	<tr>
	            <td>{{ $aventurero->nombre }}</td>
	            <td>{{ $aventurero->apellido }}</td>
	            <td>{{ $aventurero->identificacion }}</td>
	            <td>{{ $aventurero->getAge() }}</td>
	            <td>{{ $aventurero->telefono }}</td>
	            <td>{{ $aventurero->email }}</td>
	            <td>
	            	<a href="/pdc/aventureros/{{ $aventurero->id }}">Ver</a>
	            </td>
	          </tr>
			@endforeach	
        </tbody>
      </table>
	</ul>

@endsection

@section('scripts')
<script type="text/javascript">

	const localidades = {!! json_encode($localidades->toArray()) !!};

	options = localidades.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {}); 


	var elems = document.querySelectorAll('.autocomplete');
	var instances = M.Autocomplete.init(elems, { data: options });

</script>
@endsection