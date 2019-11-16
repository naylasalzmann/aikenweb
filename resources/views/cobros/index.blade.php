@extends('layoutPdc')

@section('title', 'Cobros')

@section('content')

	
	<h1>Mis cobros</h1>

	<ul>
	 	<table>
		    <thead>
		      <tr>
		          <th>Código de reserva</th>
		          <th>Nombre</th>
		          <th>Importe</th>
		          <th>Concepto</th>
		          <th>Fecha</th>
		      </tr>
		    </thead>	

    		<tbody>
			@foreach ($cobros as $cobro)
	          	<tr>
		            <td>{{ $cobro->codigo_reserva }}</td>
		            <td>{{ $cobro->nombre }} {{ $cobro->apellido }}</td>
		            <td>{{ $cobro->importe }}</td>
		            <td>{{ $cobro->concepto }}</td>
		            <td>{{ $cobro->fecha }}</td>
		            <td>
		            <form method="POST" action="/pdc/cobros/{{ $cobro->id }}">
							@method('PATCH')
							@csrf

			      				<label class="{{ $cobro->anulado ? 'is-anulado' : '' }}">
						        	<input 
						        		type="checkbox" 
						        		name="anulado" 
						        		class="filled-in" 
						        		onChange="this.form.submit()"
						        		{{ $cobro->anulado ? 'checked' : '' }} 
						        	/>
						        	<span>Anulado</span>		
						      	</label>
						</form>
	            	
	            </td>
	          </tr>
			@endforeach	
        </tbody>
      </table>
	</ul>

	<div class="fixed-action-btn">
	  <a href="{{ route('cobros.create') }}" class="btn-floating btn-large waves-effect waves-light teal">
	    <i class="material-icons">add</i>
	  </a>
	</div>

@endsection

