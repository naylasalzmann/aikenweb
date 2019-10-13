@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	
	<h1>Estas son tus localidades</h1>

	 	@foreach ($localidades as $localidad)
	 		<li>{{ $localidad->nombre }}</li>
		 @endforeach	

	<div class="row">
	    <form class="col s12">
	        <div class="input-field col s6">
	          <input type="text" id="pais" class="autocomplete">
	          <label for="pais">País</label>
	        </div>
	        <div class="input-field col s6">
	          <input id="provincia" type="text" class="validate">
	          <label for="provincia">Provincia</label>
	        </div>
	        <div class="input-field col s12">
	          <input id="localidad" type="text" class="validate">
	          <label for="localidad">Localidad</label>
	        </div>
	      </div>
	</div>
	

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

@endsection

@section('scripts')
<script type="text/javascript">
	const paises = {
        "Argentina": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      };
      
	document.addEventListener('DOMContentLoaded', function() {
    	var elems = document.getElementById('pais');
    	var instances = M.Autocomplete.init(elems, {data :  paises});

  	});


	const provincias = {
        "Buenos Aires": null,
        "Cordoba": null,
        "Google": 'https://placehold.it/250x250'
      };
      
	document.addEventListener('DOMContentLoaded', function() {
    	var elems = document.getElementById('provincia');
    	var instances = M.Autocomplete.init(elems, {data :  provincias});

  	});

</script>
@endsection