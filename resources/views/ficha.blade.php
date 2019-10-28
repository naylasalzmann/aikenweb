@extends('layout')

@section('content')

	<div class="container">
		
		 <div class="row">
	  		<div class="col s12">
	      		<h3>{{ $salida->titulo }}</h3>
	  		</div>
	      	<div class="col s6">
	      		<!-- Ver Fechas Modal Trigger -->
				<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ver fechas</a>

			  	<!-- Ver Fechas Modal Structure -->
			  	<div id="modal1" class="modal">
			    	<div class="modal-content">
			      		<h4>Selecciona una fecha</h4>
			      		@if ($salida->fechas->count())
							@foreach ($salida->fechas as $fecha)
								<div class="col s6">
									{{ $fecha->getFormattedInicio() }}
								</div>
								<div class="col s6">
									<a href="/checkout/{{ $fecha->id }}">Elegir</a>
								</div>
							
							@endforeach	 		
						@endif				
			    	</div>
			    	<div class="modal-footer">
			      		<a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
			    	</div>
			  	</div>

			  	<!-- Consultar Modal Trigger -->
				<a class="waves-effect waves-light btn modal-trigger" href="#modal2">Consultar</a>

			  	<!-- Consultar Modal Structure -->
			  	<div id="modal2" class="modal">
			    	<div class="modal-content">
			      		<h4>Consultanos</h4>
			      		
			      		<div class="row">
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
			    	</div>
			    	<div class="modal-footer">
			      		<a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
			    	</div>
			  	</div>
			</div>
	    </div>
	</div>



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