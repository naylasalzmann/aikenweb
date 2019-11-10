@extends('layout')


@section('content')



<!-- Section: Slider -->
<section class="slider">
<ul class="slides">
  <li>
    <img src="{{ asset('images/resort1.jpg') }}">
    <div class="caption center-align">
      	<h2>Viví una experiencia diferente</h2>
      	<h5 class="light grey-text text-lighten-3 hide-on-small-only">
      		Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
  		</h5>
    </div>
  </li>
  <li>
    <img class="homeImg" src="{{ asset('images/resort2.jpg') }}">
    <div class="caption left-align">
      <h2>We work with all budgets</h2>
      <h5 class="light grey-text text-lighten-3 hide-on-small-only">
      	Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
      </h5>
    </div>
  </li>
  <li>
    <img src="{{ asset('images/resort3.jpg') }}">
    <div class="caption right-align">
      <h2>Group & individual getaways</h2>
      <h5 class="light grey-text text-lighten-3 hide-on-small-only">
      	Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
      </h5>
    </div>
  </li>
</ul>
</section> 

<!-- Section: Search -->	
<section id="search" class="section section-search teal darken-1 white-text center scrollspy">
	<div class="container">
		<div class="row">
			<div class="col s12">
			<h3>Search destinations</h3>
				<div class="input-field">
				<input 
		          	type="text" 
		          	id="autocomplete-input" 
		          	class="white grey-text autocomplete" 
		          	value=""
		          	placeholder="Los Gigantes, Capilla Del Monte" 
					>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section: Icon Boxes -->
<section class="section section-icons grey lighten-4 center">
	<div class="container">
		<div class="row">
			<div class="col s12 m4">
				<div class="card-panel">
					<i class="material-icons large teal-text">room</i>
					<h4>Pick Where</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. </p>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card-panel">
					<i class="material-icons large teal-text">room</i>
					<h4>Pick Where</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. </p>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card-panel">
					<i class="material-icons large teal-text">room</i>
					<h4>Pick Where</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. </p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section: Popular places -->
<section id="popular" class="section section-popular scrollspy">
	<div class="container">
		<div class="row">
			<h4 class="center">Popular places</h4>
			<div class="col s12 m4">
				<div class="card">
					<div class="card-image">
						<img src="{{ asset('images/resort1.jpg') }}">
						<span class="card-title">
							Cancún, México	
						</span>
					</div>
					<div class="card-content">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
					</div>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card">
					<div class="card-image">
						<img src="{{ asset('images/resort2.jpg') }}">
						<span class="card-title">
							Bahamas
						</span>
					</div>
					<div class="card-content">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
					</div>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card">
					<div class="card-image">
						<img src="{{ asset('images/resort3.jpg') }}">
						<span class="card-title">
							El Chaltén, Santa Cruz
						</span>
					</div>
					<div class="card-content">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section id="proximas" class="section section-proximas scrollspy">
	<div class="container">
		<div class="row">
			<h4 class="center">Próximas salidas</h4>
			@foreach ($salidas as $salida)
			 	<div class="col s12 m4">
				<div class="card small">
					<div class="card-image">
							<a href="/{{ $salida->id }}">
								<img src="{{ asset('images/resort3.jpg') }}" href="/{{ $salida->id }}">	
							</a> 
						<span class="card-title">
							<a class="white-text" href="/{{ $salida->id }}">{{ $salida->titulo }}</a> 
						</span>
					</div>
					<div class="card-content">
						{{ $salida->subtitulo }}
					</div>
				</div>
			</div>
			@endforeach	
		</div>
	</div>
</section>

<!-- Section: Follow -->
<section class="section section-follow teal darken-2 white-text center">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4>Síguenos en nuestras redes</h4>
				<p>Follow us on social media for special offers</p>
				<a href="#" class="white-text">
					<i class="fab fa-facebook fa-4x"></i>
				</a>
				<a href="#" class="white-text">
					<i class="fab fa-twitter fa-4x"></i>
				</a>
				<a href="#" class="white-text">
					<i class="fab fa-instagram fa-4x"></i>
				</a>
				<a href="#" class="white-text">
					<i class="fab fa-linkedin fa-4x"></i>
				</a>
			</div>
		</div>
	</div>  
</section>

<!-- Section: Gallery -->
<section id="gallery" class="section section-gallery scrollspy">
	<div class="container">
		<h4 class="center">
			Galería
		</h4>
		<div class="row">
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?beach" alt="" class="materialboxed responsive-img">
			</div>
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?cliff" alt="" class="materialboxed responsive-img">
			</div>
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?mountains" alt="" class="materialboxed responsive-img">
			</div>
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?climbing" alt="" class="materialboxed responsive-img">
			</div>
		</div>
		<div class="row">
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?nature" alt="" class="materialboxed responsive-img">
			</div>
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?alaska" alt="" class="materialboxed responsive-img">
			</div>
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?kayak" alt="" class="materialboxed responsive-img">
			</div>
			<div class="col s12 m3">
				<img src="https://source.unsplash.com/1600x900/?paragliding" alt="" class="materialboxed responsive-img">
			</div>
		</div>
	</div>
</section>

<!-- Section: Contact -->
<section id="contact" class="section section-contact scrollspy">
	<div class="container">
		<div class="row">
			<div class="col s12 m6">
				<div class="card-panel teal white-text center">
					<i class="material-icons">email</i>
					<h5>Contactanos</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ornare nibh. Fusce sodales bibendum odio, eget blandit nibh dictum vitae.
					</p>
				</div>
				<ul class="collection with-header">
					<li class="collection-header">
						<h4>Location</h4>
					</li>
					<li class="collection-item">Aiken Outdoor Activities</li>
					<li class="collection-item">Villa Carlos Paz, Córoba, Argentina	</li>
				</ul>
			</div>
			<div class="col s12 m6">
				<div class="card-panel grey lighten-3">
					<h5>Tus datos</h5>
					<div class="input-field">
						<input type="text" placeholder="Nombre">
					</div>
					<div class="input-field">
						<input type="text" placeholder="Email">
					</div>
					<div class="input-field">
						<input type="text" placeholder="Localidad">
					</div>
					<div class="input-field">
						<textarea class="materialize-textarea" type="text" placeholder="Consulta"></textarea> 
					</div>
					<input type="submit" value="Submit" class="btn">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
<footer class="section teal darken-2 white-text center">
	<p class="flow-text">Aiken Outdoor Activities &copy; 2020</p>
</footer>

@endsection

@section('scripts')
<script type="text/javascript">
	// Slider
	const slider = document.querySelector('.slider');
	M.Slider.init(slider, {
		indicators: false,
		heigth: 500,
		transition: 500,
		interval: 6000
	});

	// Autocomplete
	const ac = document.querySelector('.autocomplete');
	M.Autocomplete.init(ac, {
		data: {
			"Capilla Del Monte": null,
			"Los Gigantes": null,
		}
	});

	//Material Boxed
	const mb = document.querySelectorAll('.materialboxed');
	M.Materialbox.init(mb, {});

	// ScrollSpy
	const ss = document.querySelectorAll('.scrollspy');
	M.ScrollSpy.init(ss, {});

</script>
@endsection