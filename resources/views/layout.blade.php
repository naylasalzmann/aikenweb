   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import Font Aweso,e-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

   <style type="text/css">
   
    .section-search input {
      padding: 5px !important;
      font-size: 18px !important;
      width: 90% !important;
      border: #f4f4f4 3px solid !important;
    }

    .section-follow .fa-4x {
      margin: 5px 10px;
    }

    .homeImg: {
      height: auto;
      width:  100%;
    }

    /* Modal de la ficha */
    .modal { 
      /*width: 50% !important;*/
      /*height: 100% !important;*/
     /* overflow-y: hidden !important ;*/
    }

  </style>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
     
  <title>@yield('title', 'Aiken')</title>
</head>
<body class="scrollspy"> 
 <!-- Navbar -->
<div class="navbar-fixed">
  <nav class="teal">
    <div class="container">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo">Aiken</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="#">Equipo</a>
          </li>
          <li>
            <a href="#">Coorporativo</a>
          </li>
          <li>
            <a href="#">Educativo</a>
          </li>
          <li>
            <a href="#contact">Contacto</a>
          </li>
        </ul>
      </div>
    </nav>
      
    </div>
  
</div>

  <ul class="sidenav" id="mobile-demo">
    <li>
      <a href="#">Equipo</a>
    </li>
    <li>
      <a href="#">Coorporativo</a>
    </li>
    <li>
      <a href="#">Educativo</a>
    </li>
    <li>
      <a href="#contact">Contacto</a>
    </li>
  </ul>


    @yield('content')
    


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
    <script type="text/javascript">
      // Sidenav
        const sideNav = document.querySelector('.sidenav');
        var instances = M.Sidenav.init(sideNav, {});
    </script>

    @yield('scripts')

</body>
</html>


    
