@extends('layoutPdc')

@section('title', 'Ver salida')

@section('content')

	<h1>{{ $salida->titulo }}</h1>
	<div>{{ $salida->tipo->descripcion }}</div>
	<div>{{ $salida->condicion->titulo }}</div>
	<div>{{ $salida->zona->nombre }}</div>
	<div>{{ $salida->titulo }}</div>
	<div>{{ $salida->subtitulo }}</div>
	<div>{{ $salida->descripcion }}</div>
	<div>{{ $salida->cupo_maximo }}</div>
	<div>{{ $salida->cupo_minimo }}</div>
	<div>{{ $salida->precio }}</div>


	@if ($salida->fechas->count())
		<div>
			@foreach ($salida->fechas as $fecha)
				<div>
					<form method="POST" action="/fechas/{{ $fecha->id }}">
						@method('PATCH')
						@csrf
					 	<span class="{{ $fecha->concretada ? 'is-concretada' : '' }}">
					 		{{ $fecha->inicio }}
					 	</span>
		      				<label class="{{ $fecha->concretada ? 'is-concretada' : '' }}">
					        	<input 
					        		type="checkbox" 
					        		name="concretada" 
					        		class="filled-in" 
					        		onChange="this.form.submit()"
					        		{{ $fecha->concretada ? 'checked' : '' }} 
					        	/>
					        	<span>Concretada</span>		
					      	</label>
					</form>
				</div>
			@endforeach			

		</div>
	@endif

	<div class="input-field col s12">
		<a href="/pdc/salidas/{{ $salida->id }}/edit">Editar</a>
	</div>

	<div>
		<h4>Añade una nueva fecha</h4>
		<form method="POST" action="/salidas/{{ $salida->id }}/fechas">

			@csrf


			<div class="input-field col s12">
	          	<input 
	          		id="inicio" 
	          		name="inicio" 
	          		type="datetime-local" 
	          		value="{{ old('inicio') }}"
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')"  				          		
	          		class="validate"
	          	>
	          	<label for="inicio" class="active">Inicio</label>
	          	
	        </div>

	        <div class="input-field col s12">
	        	<input 
	          		id="fin" 
	          		name="fin" 
	          		type="datetime-local" 
	          		value="{{ old('fin') }}"
					oninvalid="this.setCustomValidity('No olvides completar este campo.')"
					oninput="this.setCustomValidity('')"  				          		
	          		class="validate"
	          	>
	          	<label for="fin" class="active">Fin</label>
	        </div>

	        <div class="col s12">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Agregar
				</button>
      		</div>

      		@include ('errors')
      		
		</form>
	</div>
	<div class="row">
		<h4>Fotos</h4>	


		<!--<img src="{{  asset('storage/demo.png') }}">-->
		
		<!-- <img src="{{  asset('storage/salidas/1/tws.jpeg') }}"> -->
		<!--<img src="{{ url('storage/app/public/demo.png') }}" alt="" title="" /> -->

		@foreach ($photos as $photo)
			<img style="height: 200; width: 150px;" src="{{  asset('storage/'.$photo) }}">
		@endforeach

		<h4>Agregar fotos</h4>
		<form method="POST" action="/pdc/salidas/{{ $salida->id }}" enctype="multipart/form-data">
			@method('PATCH')	

			@csrf

			<!-- img upload -->
	        <div class="file-field input-field col s12">
		      <div class="btn">
		        <span>File</span>
		        <input type="file" name="photos[]" multiple>
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text" placeholder="Upload one or more files">
		      </div>
		    </div>

		    <div class="col s12">
	      		<button class="btn waves-effect waves-light" type="submit" name="action">Agregar
					<i class="material-icons right">send</i>
				</button>
      		</div>

      		@include ('errors')
		</form>
	</div>
@endsection