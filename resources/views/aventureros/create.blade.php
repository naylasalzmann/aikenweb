@extends('layoutPdc')

@section('title', 'Registrar aventurero')

@section('content')


<h3>Registra un nuevo aventurero</h3>

<div class="row">
	<form method="POST" action="/pdc/aventureros">
		
		@csrf

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
			<div class="input-field col s6">
			    <input 
			       id="identificacion" 
			       name="identificacion" 
			       type="text" 
			       value="{{ $reserva['identificacion'] ?? old('identificacion') }}"
			    >
			    <label for="identificacion">DNI o pasaporte</label>
			</div>
          <div class="input-field col s6">
              <input 
                id="fechaNacimiento" 
                name="fecha_nacimiento" 
                type="date" 
                value="{{ $reserva['fecha_nacimiento'] ?? old('fecha_nacimiento') }}"
              >
              <label for="fechaNacimiento" class="active">Fecha de nacimiento</label>
          </div>
            <div class="input-field col s6">
              <select 
                id="localidad" 
                name="localidad_id" 
                class="localidad"
              >
                <option value="" disabled selected>Seleccione</option>
                @foreach ($localidades as $localidad)
                  <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
                @endforeach
              </select>
              <label for="localidad">Localidad</label>
          </div>
          <div class="input-field col s6">
            <input 
              id="direccion" 
              name="direccion" 
              type="text" 
              value="{{ $reserva['direccion'] ?? old('direccion') }}"
            >
            <label for="direccion">Dirección</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="telefono" 
                name="telefono" 
                type="text" 
                value="{{ $reserva['telefono'] ?? old('telefono') }}"
              >
              <label for="telefono">Teléfono</label>
          </div>
          <div class="input-field col s6">
              <input 
                id="email" 
                name="email" 
                type="email" 
                value="{{ $reserva['email'] ?? old('email') }}"
              >
              <label for="email">E-mail</label>
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

@section('scripts')
  <script type="text/javascript">
    const localidades = {!! json_encode($localidades->toArray()) !!}
    
    const localidadesParaAutocomplete =  localidades.reduce((obj, item) => {
      obj[item['nombre']] = null
      return obj
    }, {}); 

    const elems = document.querySelector('.localidad');
    const instances = M.FormSelect.init(elems, {data : localidadesParaAutocomplete});


  </script>
@endsection

