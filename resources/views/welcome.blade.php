@extends('layout')

@section('content')

	<div class="container">
		
		 <div class="row">
	  		<div class="col s12">
	    		<h1>Este el home del turista</h1>
	  		</div>
	      	<div class="col s6">
	  		</div>

	    </div>
	</div>

	<div class="container">
		
		 <div class="row">
	  		<div class="col s12">
				<ul>
				    @foreach ($proximas as $proxima)
				        <li> <a href="/salidas">{{ $proxima }}</a></li>
				    @endforeach
				</ul>
	  		</div>
	    </div>
	</div>


@endsection