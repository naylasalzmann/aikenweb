@extends('layoutPdc')

@section('title', 'Crear un nuevo título')

@section('content')


<h3>Crea un nuevo título</h3>

<div class="row">
	<form method="POST" action="/pdc/titulos">
		
		@csrf

        <div class="input-field col s6">
          	<input 
          		id="titulo" 
          		name="descripcion" 
          		type="text" 
          		value="{{ old('descripcion') }}"
				required
				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="titulo">Título</label>
        </div>
      	<div class="col s12">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>
      	</div>


      	@include ('errors')
	</form>
	</div>


@endsection

