@extends('layoutPdc')

@section('title', 'Registrar cobro')

@section('content')


<h3>Registra un nuevo cobro</h3>

<div class="row">
	<form method="POST" action="/pdc/cobros">
		
		@csrf
        <div class="input-field col s6">
            <input 
              id="codigo_reserva" 
              name="codigo_reserva" 
              type="text" 
              value="{{ $reserva['codigo_reserva'] ?? old('codigo_reserva') }}"
            >
            <label for="codigo_reserva">Código de la reserva (no requerido)</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="identificacion" 
                name="identificacion" 
                type="text" 
                value="{{ $reserva['identificacion'] ?? old('identificacion')}}"
              >
              <label for="identificacion">DNI o pasaporte (no requerido)</label>
          </div>
          <div class="input-field col s6">
            <input 
              id="nombre" 
              name="nombre" 
              type="text" 
              value="{{ $reserva['nombre'] ?? old('nombre') }}"
              required
              oninvalid="this.setCustomValidity('No olvides completar este campo.')"
              oninput="this.setCustomValidity('')"                        
              class="validate"
            >
            <label for="nombre">Nombre</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="apellido" 
                name="apellido" 
                type="text" 
                value="{{ $reserva['apellido'] ?? old('apellido') }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="apellido">Apellido</label>
          </div>
          <div class="input-field col s12">
              <input 
                id="importe" 
                name="importe" 
                type="text" 
                value="{{ $reserva['importe'] ?? old('importe') }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="importe">Importe</label>
          </div>

          <div class="input-field col s12">
              <input 
                id="fecha" 
                name="fecha" 
                type="date" 
                value="{{ old('fecha') }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="importe">Fecha</label>
          </div>


        <div class="input-field col s12">
          	<input 
          		id="titulo" 
          		name="concepto" 
          		type="text" 
          		value="{{ old('concepto') }}"
      				required
      				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
      				oninput="this.setCustomValidity('')"  				          		
          		class="validate"
          	>
          	<label for="concepto">Concepto</label>
        </div>
        <input 
            name="salida_id" 
            hidden
            type="text" 
            value="{{ $reserva['salida_id'] }}"
        >
      	<div class="col s12">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    				<i class="material-icons right">send</i>
    			</button>
      	</div>


    @include ('errors')
	</form>
</div>


@endsection

