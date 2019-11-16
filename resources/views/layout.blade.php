   
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

    /* Modal de la ficha */
    .modal { 
      /*width: 50% !important;*/
      height: 100% !important;
      /*overflow-y: hidden !important ;*/
    }


    .brand-logo {
      margin-left: 32px;
    }

    .ficha-container {
      margin: 0 auto;
      max-width: 1280px;
      width: 90%;
      color: #484848;
    }

    .principal-ficha {
      width: 100%;
      /*width: 499px; */

      height: 402px;
      background-size: cover;
    }

    .fotos-mas-chicas-ficha {
      width: 297px;
      height: 198px;
    }

    .col-portada-ficha {
      padding: 0 0.24rem !important;
    }

    .atributos {
      font-weight: bold;
    }

    .titulo-ficha {
      font-weight: 500;
    }

    .salida-detalle-row {
      margin-top: 32px;
    }

    .descripciones-detalle-ficha {
      margin-top: 28px;
    }

  
  </style>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
     
  <title>@yield('title', 'Aiken')</title>
</head>
<body class="scrollspy"> 

<header>
   <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="teal">
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
  
</header>


    @yield('content')
    


    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
    <script type="text/javascript">
      // Sidenav
        const sideNav = document.querySelector('.sidenav');
        var instances = M.Sidenav.init(sideNav, {});
    </script>

    @yield('scripts')

  <!-- Footer -->
  <footer class="section teal darken-2 white-text center">
    <p class="flow-text">Aiken Outdoor Activities &copy; 2020</p>
  </footer>
</body>
</html>


    
