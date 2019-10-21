<div class="col s12">
	@if ($errors->any())

		<div class="alert is-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li class="card-panel red darken-2 white-text"> {{ $error }} </li>
				@endforeach
			</ul>
		</div>

	@endif
</div>