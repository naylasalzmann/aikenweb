@extends('layoutPdc')

@section('title', 'Fechas')

@section('content')


<h1>Fechas de salidas</h1>

<h4>Inscriptos por fecha</h4>
<div class="row">
	<form action="/pdc/fechas">
		<div class="input-field col s10">
	      	<select id="fecha" name="fecha_id" class="select">
				<option value="" disabled selected>Fecha</option>
	        	@foreach ($fechasPendientes as $fecha)
					  <option value="{{ $fecha->id }}">{{ $fecha->getFormattedInicio() }} {{ $fecha->salida->titulo }}</option>
	        	@endforeach
			</select>
		</div>

		<div class="input-field col s2">
      		<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
			</button>
  		</div>
	</form>
</div>

<p>{{ $selectedFecha ? $selectedFecha->getFormattedInicio() : '' }}</p>


<div class="row">
	<div class="col s11" id="print">
		@foreach($fechasPendientes as $fecha)
			<h6>{{ $fecha->salida->titulo }}, {{ $fecha->getFormattedInicio() }}</h6>

		 	@foreach($fecha->confirmaciones as $confirmacion)
		 		<div><b>{{ $confirmacion->reserva->nombre }} {{ $confirmacion->reserva->apellido }}</b></div>
		 		<div>DNI o Pasaporte: {{ $confirmacion->reserva->identificacion }}</div>
		 		<div>Edad: {{ $confirmacion->reserva->getAge() }}</div>
		 		<div>Dirección: {{ $confirmacion->reserva->direccion }}</div>
		 		<div>Teléfono: {{ $confirmacion->reserva->telefono }}</div>
		 		<div>Email: {{ $confirmacion->reserva->email }}</div>
		 		<div>Acompañantes: {{ $confirmacion->reserva->getAcompañantes() }}</div>
			@endforeach
		@endforeach
	</div>
	<div class="col s1">
		<a href="" onClick="printData()" target="_blank" class="teal-text">
			<i class="material-icons">print</i>
		</a>
	</div>
</div>

<div class="row">
	<div class="col s11">
		<div id="print2">
			<h4>Fechas pendientes</h4>
			<ul>
			 	<table >
				    <thead>
				      <tr>
				          <th>Inicio</th>
				          <th>Salida</th>
				          <th>Zona</th>
				      </tr>
				    </thead>	

		    		<tbody>
					@foreach ($fechasPendientesTodas as $fecha)
			          	<tr>
			            <td>{{ $fecha->getFormattedInicio() }}</td>
			            <td>{{ $fecha->salida->titulo }}</td>
			            <td>{{ $fecha->salida->zona->nombre }}</td>
			          </tr>
					@endforeach	
		        </tbody>
		      </table>
			</ul>
		</div>
	</div>
	<div class="col s1">
		<a href="" onClick="print2()" target="_blank" class="teal-text">
			<i class="material-icons">print</i>
		</a>
	</div>
</div>



@endsection

@section('scripts')

<script type="text/javascript">

  const elems = document.querySelectorAll('.select');
  

  const fechasPendientes = {!! json_encode($fechasPendientes->toArray()) !!};

  const fechasPendientesParaSelect =  fechasPendientes.reduce((obj, item) => {
      obj[item['getFormattedInicio()']] = null
      return obj
  }, {});

  M.FormSelect.init(elems, {data : fechasPendientesParaSelect});


  function print2() {
	    const divToPrint=document.getElementById("print2");
	    newWin= window.open("");
	    newWin.document.write(divToPrint.outerHTML);
	    newWin.print();
	    newWin.close();
    }
     
</script>


@endsection