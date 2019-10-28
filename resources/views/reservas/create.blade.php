   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import Font Aweso,e-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

   <style type="text/css">
   
  </style>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
     
  <title>{{ $fecha->salida->titulo }}</title>
</head>

 <!-- Navbar -->
<div class="navbar-fixed">
  <nav class="teal">
    <div class="container">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">Aiken</a>
      </div>
    </nav>
    </div>
</div>

<!-- Section: Datos -->
<section id="contact" class="section section-datos">
  <div class="container">
    <form method="POST" action="/pdc/reservas">
    
    @csrf
      <div class="row">
        <div class="col s12 m8">
          <div class="col s12">
            <h5>A tener en cuenta</h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
            </p>

            <h5>Tus datos</h5>
          </div>
          <div class="input-field col s6">
            <input 
              id="nombre" 
              name="nombre" 
              type="text" 
              value="{{ old('nombre') }}"
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
                value="{{ old('apellido') }}"
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
                value="{{ old('identificacion') }}"
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
                value="{{ old('fecha_nacimiento') }}"
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
              value="{{ old('direccion') }}"
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
                value="{{ old('telefono') }}"
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
                value="{{ old('email') }}"
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
                onChange="getTotal()"
              >
                  @for ($i = 1 ; $i <= $fecha->salida->cupo_maximo ; $i++)
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
                <option value="" disabled selected>Seleccione</option>
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
                type="hidden" 
                value="{{ $fecha->salida->precio }}" 
             >
          </div>
          <div class="input-field col s12">
            <input 
                id="total" 
                name="fecha_id" 
                type="hidden" 
                value="{{ $fecha->id }}" 
             >
          </div>

        <div class="col s12">  
          <button class="btn waves-effect waves-light" type="submit" name="action">Solicitar reserva
              <i class="material-icons right">send</i>
          </button>
        </div>
        @include ('errors')
      </div>
  </form>

<!-- Section: Resumen de la reserva -->
  <div class="col s12 m4">
  <h5 class="center">Tu salida</h5>
    <div class="card">
      <div class="card-image">
        <img src="{{ asset('images/resort1.jpg') }}">
        <span class="card-title">
          {{ $fecha->salida->titulo }}  
        </span>
      </div>
      <div class="card-content">
        <div>Duración: 
          @switch($fecha)
              @case($fecha->getDaysDuration() == 1)
                <span> {{ $fecha->getDaysDuration() }} día</span>
                @break

              @case($fecha->getDaysDuration() > 1)
                <span> {{ $fecha->getDaysDuration() }} días</span>
                @break

              @default
                <span>{{ $fecha->getHoursDuration() }} horas</span>
          @endswitch
        </div>
        <div>Guia NTH</div>
        <div>Inicio: {{ $fecha->getFormattedInicio() }}</div>
        <div id="precio" data-value="{{ $fecha->salida->precio }}">Precio: {{ $fecha->salida->precio }}</div>
        <div class="row">
          <div class="input-field col s12">
            Total
            <input 
                id="total"
                class="total" 
                name="total" 
                type="text" 
                value="{{ $fecha->salida->precio }}"
                disabled 
             >
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
    <script type="text/javascript">

      // Aventureros y metodos de pago select
      const elems = document.querySelectorAll('.select');
      M.FormSelect.init(elems, {});

      // Calcular precio
      function getTotal(){
        var precio = document.getElementById("precio").getAttribute('data-value');
        var aventureros = document.getElementsByName("cant_aventureros")[0].value;
        const total = precio * aventureros;

        document.getElementsByName('total')[0].value = aventureros * precio;
        document.getElementsByName('monto_total')[0].value = aventureros * precio;
      }
    </script>

</body>
</html>


    