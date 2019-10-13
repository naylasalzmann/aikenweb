@extends('layoutPdc')

@section('title', 'Condiciones de reserva')

@section('content')


<h3>Crea nuevas condiciones de reserva</h3>

<div class="row">
	<form method="POST" action="/pdc/condiciones">
		
		@csrf

        <div class="input-field col s12">
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

