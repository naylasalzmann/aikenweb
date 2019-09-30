@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	<div class="container">
		
		 <div class="row">
	  		<div class="col s3">
	      		@section('sidenav')
	      		@endsection
			 
	  		</div>
	      	<div class="col s9">
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
	    </div>
	</div>

  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

@endsection

@section('scripts')
<script type="text/javascript">
	var options = {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      };
      
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.getElementById('pais');
    var instances = M.Autocomplete.init(elems, {data :  options});

  });


	//var instance = M.Autocomplete.getInstance(elem);	
</script>
@endsection