@extends('layoutPdc')

@section('title', 'Confirmaciones')

@section('content')

	
	<h1>Reservas confirmadas</h1>

	<table id="my-table-id">
        <thead>
          <tr>
              <th>Reserva</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Monto</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($confirmaciones as $confirmacion)
          <tr>
            <td>
            	<a href="/pdc/confirmaciones/{{ $confirmacion->id }}" class="teal-text">{{ $confirmacion->reserva->codigo }}</a>
            </td>
            <td>
              <a href="/pdc/confirmaciones/{{ $confirmacion->id }}" class="teal-text" >
                {{ $confirmacion->reserva->nombre }}
              </a>
          </td>
            <td>
              <a href="pdc/confirmaciones/{{ $confirmacion->id }}" class="teal-text">
              {{ $confirmacion->reserva->apellido }}
              </a>
            </td>
            <td>
              <a href="pdc/confirmaciones/{{ $confirmacion->id }}" class="teal-text">
                {{ $confirmacion->reserva->monto_total }}
              </a>
            </td>
            
            <td>
              <form method="GET" action="/pdc/aventureros/create">
              @csrf

              <input 
                  name="identificacion" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->identificacion }}"
              >
              <input 
                  name="nombre" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->nombre }}"
              >
              <input 
                  name="apellido" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->apellido }}"
              >
              <input 
                  name="fecha_nacimiento" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->fecha_nacimiento }}"
              >
              <input 
                  name="direccion" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->direccion }}"
              >
              <input 
                  name="telefono" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->telefono }}"
              >
              <input 
                  name="email" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->email }}"
              >
              <button 
                      class="modal-close btn waves-effect waves-light tooltipped" 
                      type="submit" 
                      name="action"
                      data-position="bottom"
                      data-tooltip="Agregar aventurero"
              >
                +
              </button>
            </form>
            </td>
            <td>
            
            <form method="GET" action="/pdc/cobros/create">
              @csrf

              <input 
                  name="identificacion" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->identificacion }}"
              >
              <input 
                  name="nombre" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->nombre }}"
              >
              <input 
                  name="apellido" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->apellido }}"
              >
              <input 
                  name="codigo_reserva" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->codigo }}"
              >
              <input 
                  name="importe" 
                  hidden
                  type="text" 
                  value="{{ $confirmacion->reserva->monto_total }}"
              >
                <button 
                    class="modal-close btn waves-effect waves-light" 
                    type="submit" 
                    name="action"
                  >
                    Registrar cobro
                </button>
            </form>
            </td>
            <td>
              <div>
                  <form method="POST" action="/pdc/cancelaciones">
                    @csrf

                    <input 
                      id="confirmacion_id" 
                      name="confirmacion_id" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->id }}"
                    >
                    <input 
                      id="reserva_id" 
                      name="reserva_id" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva_id }}"
                    >
                    <input 
                      id="codigo" 
                      name="codigo" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->codigo }}"
                    >
                    <input 
                      id="identificacion" 
                      name="identificacion" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->identificacion }}"
                    >
                    <input 
                      id="nombre" 
                      name="nombre" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->nombre }}"
                    >
                    <input 
                      id="apellido" 
                      name="apellido" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->apellido }}"
                    >
                    <input 
                      id="telefono" 
                      name="telefono" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->telefono }}"
                    >
                    <input 
                      id="email" 
                      name="email" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->email }}"
                    >
                    <input 
                      id="monto_total" 
                      name="monto_total" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->monto_total }}"
                    >
                    <input 
                      id="cant_aventureros" 
                      name="cant_aventureros" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->cant_aventureros }}"
                    >
                    <input 
                      id="fecha_id" 
                      name="fecha_id" 
                      hidden
                      type="text" 
                      value="{{ $confirmacion->reserva->fecha_id }}"
                    >

                    <button 
        				    	class="modal-close btn waves-effect waves-light red" 
        				    	type="submit" 
        				    	name="action"
		    		        >
				    	       Cancelar
		              	 <i class="material-icons right">send</i>
            		  </button>


                  </form>
              </div>
            </td>
          </tr>
         @endforeach	
        </tbody>
      </table>


@endsection

@section('scripts')

<script type="text/javascript">

	
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, {});

</script>

@endsection
