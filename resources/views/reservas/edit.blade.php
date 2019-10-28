@extends('layoutPdc')

@section('title', 'Editar reserva')

@section('content')

	<h3>Editar reserva</h3>

	<div class="row">
		<form method="POST" action="/pdc/reservas/{{ $reserva->id }}">
			
			@method('PATCH')

			@csrf

  		 	<div class="input-field col s6">
            <input 
              id="nombre" 
              name="nombre" 
              type="text" 
              value="{{ $reserva->nombre }}"
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
                value="{{ $reserva->apellido }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="apellido">Apellido</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="identificacion" 
                name="identificacion" 
                type="text" 
                value="{{ $reserva->identificacion }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="identificacion">DNI o pasaporte</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="fechaNacimiento" 
                name="fecha_nacimiento" 
                type="date" 
                value="{{ $reserva->fecha_nacimiento }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="fechaNacimiento" class="active">Fecha de nacimiento</label>
          </div>
          <div class="input-field col s6">
            <input 
              id="direccion" 
              name="direccion" 
              type="text" 
              value="{{ $reserva->direccion }}"
              required
              oninvalid="this.setCustomValidity('No olvides completar este campo.')"
              oninput="this.setCustomValidity('')"                        
              class="validate"
            >
            <label for="direccion">Dirección</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="telefono" 
                name="telefono" 
                type="text" 
                value="{{ $reserva->telefono }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="telefono">Teléfono</label>
          </div>
          <div class="input-field col s12">
              <input 
                id="email" 
                name="email" 
                type="email" 
                value="{{ $reserva->email }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate"
              >
              <label for="email">E-mail</label>
          </div>

          <div class="col s12">
            <h5>¿Quién viene?</h5> 
          </div>
           
          <div class="input-field col s6">
              <select 
                id="aventureros" 
                name="cant_aventureros" 
                class="aventureros select"
              >
                <option value="{{ $reserva->cant_aventureros }}">{{ $reserva->cant_aventureros }}</option>

                  @for ($i = 1 ; $i <= $reserva->fecha->salida->cupo_maximo ; $i++)
                     <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
              </select>
              <label for="aventureros">Aventureros</label>
          </div>

          <div class="col s12">
            <h5>¿Cómo querés pagar la seña?</h5>  
          </div>
          <div class="input-field col s12">
              <select 
                id="metodo" 
                name="metodo_pago_id" 
                required 
                class="metodo select"
              >
                <option value="{{ $reserva->metodo_pago_id }}">{{ $reserva->metodo->descripcion }}</option>
                @foreach ($metodos as $metodo)
                  <option value="{{ $metodo->id }}">{{ $metodo->descripcion }}</option>
                @endforeach
            </select>
            <label for="localidad">Método de pago</label>
          </div>

          <div class="input-field col s12">
            <input 
                id="total" 
                name="monto_total" 
                value="{{ $reserva->fecha->salida->precio }}"
                required
                oninvalid="this.setCustomValidity('No olvides completar este campo.')"
                oninput="this.setCustomValidity('')"                        
                class="validate" 
             >
            <label for="total" class="active">Monto total</label>
          </div>
          <div class="input-field col s12">
            <input 
                id="total" 
                name="fecha_id" 
                type="hidden" 
                value="{{ $reserva->fecha_id }}" 
             >
          </div>
  		 	

  
      	<div class="col s2">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Editar
      		</button>
      	</div>
	</form>
	<form method="POST" action="/pdc/reservas/{{ $reserva->id }}">
		
		@method('DELETE')	

		@csrf

      	<div class="col s2">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Eliminar
			</button>
      	</div>

        @include ('errors')
      	
	</form>
</div>

@endsection

<script type="text/javascript">
	
	document.addEventListener('DOMContentLoaded', function() {
		const elems = document.querySelectorAll('.select');
	    M.FormSelect.init(elems, {});
    });

</script>