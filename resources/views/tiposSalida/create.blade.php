@extends('layoutPdc')

@section('title', 'Tipos de salida')

@section('content')


<h3>Crea un nuevo tipo de salida</h3>

<div class="row">
	<form method="POST" action="/pdc/tiposSalida">
		
		@csrf

        <div class="input-field col s6">
          	<input 
          		id="tipoSalida" 
          		name="descripcion" 
          		type="text" 
          		value="{{ old('descripcion') }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="tipoSalida">Tipo de salida</label>
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

