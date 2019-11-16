@extends('layout')

@section('content')

<main>
	<section class="section grey lighten-4">
		<div class="container ficha-container">
			<div class="row">
				<p style="padding-top: 16px;">
					{{ $salida->zona->nombre }}, {{ $salida->zona->localidad->provincia->pais->nombre }}
				</p>
				<!--<div class="col s4 col-portada-ficha">
					<img class="principal-ficha" src="{{ asset('images/resort1.jpg') }}">

				</div>
				<div class="col s5 col-portada-ficha">
					<img class="principal-ficha" src="{{ asset('images/resort3.jpg') }}">

				</div>
				<div class="col s3 col-portada-ficha">
					<img width="100%" src="{{ asset('images/resort1.jpg') }}">
					<img width="100%" src="{{ asset('images/resort2.jpg') }}">
				</div>
			</div>-->
			<div class="col s4 col-portada-ficha">
					<img class="principal-ficha" src="{{  asset('storage/'.$photos[0]) }}">

				</div>
				<div class="col s5 col-portada-ficha">
					<img class="principal-ficha" src="{{  asset('storage/'.$photos[1]) }}">

				</div>
				<div class="col s3 col-portada-ficha">
					<img class="fotos-mas-chicas-ficha" src="{{  asset('storage/'.$photos[2]) }}">
					<img class="fotos-mas-chicas-ficha" src="{{  asset('storage/'.$photos[3]) }}">
				</div>
			</div> 
	      
		 	<div class="row">
		  		<div class="col s4">
		      		<h3>{{ $salida->titulo }}</h3>
		      		<p>{{ $salida->subtitulo }}</p>

		      		<!-- Consultar Modal Trigger -->
					<a class="waves-effect waves-light btn modal-trigger" href="#modal2">Consultar</a>
				  	<!-- Consultar Modal Structure -->
				  	<div id="modal2" class="modal">
				    	<div class="modal-content">
				      		<h4>Consultanos</h4>
								<form method="POST" action="/pdc/consultas">
								@csrf

							    <input 
							      id="salida_id" 
							      name="salida_id" 
							      type="text" 
							      value="{{ $salida->id }}"
							      hidden
							    >
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
									    <select 
								          id="pais" 
								          name="pais_id" 
								          required 
								          class="pais validate select"
								          required
								          oninvalid="this.setCustomValidity('No olvides completar este campo.')"
									      oninput="this.setCustomValidity('')"                        
									      class="validate"
							        	>
						   				<option value="" disabled selected>Seleccione</option>
							        	@foreach ($paises as $pais)
						    				<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
							        	@endforeach
									</select>
								      <label for="pais">País</label>
								  </div>
							      <div class="input-field col s6">
								    <select 
							          	id="provincia" 
							          	name="provincia_id" 
							         	class="provincia validate select"
						        	>
						   				<option value="" disabled selected>Seleccione</option>
							        	@foreach ($provincias as $provincia)
						    				<option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
							        	@endforeach
									</select>
								      <label for="provincia">Provincia</label>
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
								  <div class="input-field col s6">
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
								  <div class="input-field col s12">
						        	 <textarea 
						          	 	id="descripcion"
						            	name="descripcion"  
					      				required
					      				oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					      				oninput="this.setCustomValidity('')"  				          		
						          	 	class="materialize-textarea validate"
						        	 >{{ old('descripcion') }}</textarea>
						          	<label for="descripcion">Consulta</label>
						        </div>
									<div class="col s12">
										<button class="btn waves-effect waves-light" type="submit" name="action">Enviar
											<i class="material-icons right">send</i>
										</button>
									</div>
								@include ('errors')
								</form>
				    	</div>
				    	<div class="modal-footer">
				      		<a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
				    	</div>
				    </div>

			    	<!-- Ver Fechas Modal Trigger -->
					<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ver fechas</a>
				  	<!-- Ver Fechas Modal Structure -->
				  	<div id="modal1" class="modal modal-fechas">
				    	<div class="modal-content">
				      		<h4>¿Cuándo quieres ir?</h4>
				      		@if ($salida->fechas->count())
								@foreach ($salida->fechas as $fecha)
									<div class="card-panel">
										<div class="row">
											<div class="col s6">
												<div>{{ $fecha->getFormattedInicio() }}</div>
												<div>{{ $fecha->getSmartDuration() }}</div>
											</div>
											<div class="col s6">
												<a class="btn-flat teal-text" href="/checkout/{{ $fecha->id }}">Elegir</a>
											</div>
										</div>
									</div>
								@endforeach	 		
							@endif				
				    	</div>
				    	<div class="modal-footer">
				      		<a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
				    	</div>
				  	</div>
		  		</div>
		  		<div style="padding-top: 40px;">
		  			<div class="col s2" style="margin-left: 120px;">
		  				<i class="material-icons">people</i>
			  			<div>Cupo</div>
			  			<span class="atributos">Hasta {{ $salida->cupo_maximo }} personas</span>
		  			</div>
		  			<div class="col s2">
		  				<i class="material-icons">filter_hdr</i>
			  			<div>Tipo de salida</div>
			  			<span class="atributos">{{ $salida->tipo->descripcion }}</span>
		  			</div>
		  			<div class="col s2">
		  				<i class="material-icons">room</i>
			  			<div>Ubicación</div>
			  			<span class="atributos">
			  				{{ $salida->zona->localidad->nombre }}, 
			  				{{ $salida->zona->localidad->provincia->nombre }}, <br>
			  				{{ $salida->zona->localidad->provincia->pais->nombre }}
			  			</span>
		  			</div>
		  		</div>
		 	</div>
	</section>

	<!-- Descripción detallada section-->
	<section>
		<div class="container ficha-container">
			<div class="row salida-detalle-row">
				<div class="col s4">
					<h4 class="titulo-ficha">Descripción</h4>
				</div>
				<div class="col s8 descripciones-detalle-ficha">
					<p>{{ $salida->descripcion }}</p>
				</div>
			</div>
			<div class="row salida-detalle-row">
				<div class="col s4">
					<h4 class="titulo-ficha">Tu guía</h4>
				</div>
				<div class="col s8 descripciones-detalle-ficha">
					@foreach ($salida->guias as $guia)
						<h5>{{ $guia->nombre }}</h5>
						<div>
							<span>{{ $guia->titulo->descripcion ?? ''}}</span>
						</div>
					@endforeach
				</div>
			</div>
			<div class="row" style="margin-top: 32px;">
				<div class="col s4">
					<h4 class="titulo-ficha">A tener en cuenta</h4>
				</div>
				<div class="col s8" style="margin-top: 16px;">
					<p>{{ $salida->condicion->descripcion }}</p>
				</div>
			</div>
		</div>
	</section>
		 <div class="row">
	      	<div class="col s6">
	      		

			  	
			</div>
	    </div>
	</div>
</main>


@endsection

@section('scripts')

<script type="text/javascript">

	// Modal
	const modal = document.querySelectorAll('.modal');
	M.Modal.init(modal, {});

	// Inicializar selects
    const paises = {!! json_encode($paises->toArray()) !!}

	const paisesParaSelect =  paises.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {});


	


	const provincias = {!! json_encode($provincias->toArray()) !!}

	const provinciasParaSelect =  provincias.reduce((obj, item) => {
  		obj[item['nombre']] = null
  		return obj
	}, {});

	document.addEventListener('DOMContentLoaded', function() {

    	const elems = document.querySelectorAll('.select');


		M.FormSelect.init(elems, {data : paisesParaSelect});	
		M.FormSelect.init(elems, {data : provinciasParaSelect});
    	
  	});

	// Handle provincias disabled
  	document.addEventListener('DOMContentLoaded', function() {
    
		document.getElementById("pais").onchange = function () {

    		const elems = document.getElementById('provincia');


		  	if (this.value != 1) {

		  		document.getElementById("provincia").disabled = true;
		  		M.FormSelect.init(elems, {data : provinciasParaSelect});
		  	}
		  	else {
		  		document.getElementById("provincia").disabled = false;
		  		M.FormSelect.init(elems, {data : provinciasParaSelect});
		  	}

		};
  	});
</script>

@endsection