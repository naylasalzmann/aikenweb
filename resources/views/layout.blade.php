   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

     
    <title>@yield('title', 'Aiken')</title>
</head>
<body>

  <nav>
    <div class="nav-wrapper">
      <a href="/" class="brand-logo">Aiken</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Equipo</a></li>
        <li><a href="#">Coorporativo</a></li>
        <li><a href="#">Educativo</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Equipo</a></li>
    <li><a href="badges.html">Coorporativo</a></li>
    <li><a href="collapsible.html">Educativo</a></li>
    <li><a href="mobile.html">Contacto</a></li>
  </ul>
    @yield('content')

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems, {});
        });
    </script>


</body>
</html>


    
