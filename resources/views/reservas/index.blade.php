@extends('layoutPdc')

@section('title', 'Reservas')

@section('content')

  <div class="row">
    <form action="{{ route('reservas.index') }}">
      <div class="input-field col s3">
          <select id="estado" name="estado_id_filtro" class="estado select">
              <option value="" disabled selected>Estado</option>
                @foreach ($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                @endforeach
          </select>
      </div>
      <div class="input-field col s6">
          <select id="salida" name="salida_id_filtro" class="salida select">
              <option value="" disabled selected>Salida</option>
                @foreach ($salidas as $salida)
                <option value="{{ $salida->id }}">{{ $salida->titulo }}</option>
                @endforeach
          </select>
      </div>

      <div class="input-field col s3">
        <button class="btn waves-effect waves-light" type="submit" name="action">Buscar
        </button>
      </div>
    </form> 
  </div>  

  <p>{{ $selectedEstado->descripcion ?? '' }}</p>
  <p>{{ $selectedSalida->titulo ?? '' }}</p>
  <div class="row">	      
	 <h1>Reservas</h1>
	 <table>
        <thead>
          <tr>
              <th>Código</th>
              <th>Inicio</th>
              <th>Nombre</th>
              <th>Monto</th>
              <th>Estado</th>
          </tr>
        </thead>

        <tbody>
        @foreach ($noConfirmadas as $reserva)
          <tr class="{{ $reserva->estado_id == '2' ? 'is-aceptada' : '' }}">
            <td><a href="/pdc/reservas/{{ $reserva->id }}">{{ $reserva->codigo }}</a></td>
            <td>{{ $reserva->fecha->getFormattedInicio() }}</td>
            <td>{{ $reserva->nombre }}</td>
            <td>{{ $reserva->monto_total }}</td>
            <td>
              <form method="POST" action="/reservas/estado/{{ $reserva->id }}">
                  @method('PATCH')
                  @csrf
                    <div class="input-field col s12">
                  
                    <select id="estado" name="estado_id" class="estado select" onChange="this.form.submit()">
                      <option value="{{ $reserva->estado_id }}" disabled selected>{{ $reserva->estado->descripcion }}</option>
                      @foreach($estados as $estado)
                          <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                      @endforeach
                    </select>
                    </div>
                  </label>
              </form>
            </td>

            <td>
              <div>
                  <form method="POST" action="/pdc/confirmaciones">
                    @csrf

                    <input 
                      id="reserva_id" 
                      name="reserva_id" 
                      hidden
                      type="text" 
                      value="{{ $reserva->id }}"
                    >
                    <input 
                      id="cant_aventureros" 
                      name="cant_aventureros" 
                      hidden
                      type="text" 
                      value="{{ $reserva->cant_aventureros }}"
                    >
                    <input 
                      id="fecha_id" 
                      name="fecha_id"
                      hidden 
                      type="text" 
                      value="{{ $reserva->fecha_id }}"
                    >
                        <button 
                          class="btn waves-effect waves-light" 
                          type="submit" 
                          name="action" 
                          style="width: 154px;">
                          Confirmar
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

  const elems = document.querySelectorAll('.select');
  

  const estados = {!! json_encode($estados->toArray()) !!};

  const estadosParaSelect =  estados.reduce((obj, item) => {
      obj[item['descripcion']] = null
      return obj
  }, {});

  M.FormSelect.init(elems, {data : estadosParaSelect});


  const salidas = {!! json_encode($salidas->toArray()) !!};

  const salidasParaSelect =  salidas.reduce((obj, item) => {
      obj[item['titulo']] = null
      return obj
  }, {});

  M.FormSelect.init(elems, {data : salidasParaSelect});
     
</script>


@endsection