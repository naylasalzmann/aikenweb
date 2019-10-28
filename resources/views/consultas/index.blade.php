@extends('layoutPdc')

@section('title', 'Consultas')

@section('content')

	
	<h1>Consultas</h1>
	<ul>
	 	<table>
		    <thead>
		      <tr>
		          <th>Salida</th>
		          <th>Nombre</th>
		          <th>Apellido</th>
		          <th>Consulta</th>
		      </tr>
		    </thead>	

    		<tbody>
			@foreach ($consultas as $consulta)
	          	<tr href="/pdc/salidas">
	            <td>{{ $consulta->salida->titulo ?? 'Una salida que ya no existe' }}</td>
	            <td>{{ $consulta->nombre }}</td>
	            <td>{{ $consulta->apellido }}</td>
	            <td>
	            	<span class="text">{{ $consulta->descripcion }}</span>
	            </td>
	            <td>
		            <form method="POST" action="/pdc/consultas/{{ $consulta->id }}">
						@method('PATCH')
						@csrf
						<div>
		      				<label class="{{ $consulta->vista ? 'is-vista' : '' }}">
					        	<input 
					        		type="checkbox" 
					        		name="vista" 
					        		class="filled-in" 
					        		onChange="this.form.submit()"
					        		{{ $consulta->vista ? 'checked' : '' }} 
					        	/>
					        	<span>Respondida</span>		
					      	</label>
							
						</div>
					</form>
	            </td>
	            <td>
	            	<a href="/pdc/consultas/{{ $consulta->id }}" class="teal-text">Ver</a>
	            </td>
	          </tr>
			@endforeach	
        </tbody>
      </table>
	</ul>

@endsection

