<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.css')}}"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

     
    <title>@yield('title', 'Panel de control')</title>
</head>
<body>
      @yield('content')

       <ul id="slide-out" class="sidenav sidenav-fixed">
          <li><div class="user-view">
            <div class="background">
              <img src="">
            </div>
            <a href="#user"><img class="circle" src=""></a>
            <a href="#name"><span class="grey-text name">Admin</span></a>
            <a href="#email"><span class="grey-text email">admin@gmail.com</span></a>
          </div></li>
          <li><a href="/pdc/reservas"><i class="material-icons">cloud</i>Reservas</a></li>
          <li><a href="#!">Confirmaciones</a></li>
          <li><div class="divider"></div></li>
          <li><a class="subheader">Cancelaciones</a></li>
          <li><a class="waves-effect" href="/pdc/salidas">Salidas</a></li>
          <li><a class="waves-effect" href="/pdc/consultas">Consultas</a></li>
          <li><a class="waves-effect" href="/pdc/guias">Guías</a></li>
          <li><a class="waves-effect" href="/pdc/localidades">Localidades y zonas</a></li>
          <li><a class="dropdown-trigger" href="/pdc/localidades" data-target="dropdown1">Otros<i class="material-icons right">arrow_drop_down</i></a></li>
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="/pdc/tiposSalida">Tipos de salida</a></li>
            <li><a href="#!">Títulos</a></li>
            <li><a href="/pdc/condiciones">Condiciones para reservar</a></li>
          </ul>
        </ul>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
     

     <!--JavaScript at end of body for optimized loading-->
      <script src="{{ asset('js/materialize.js') }}"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.dropdown-trigger');
          var instances = M.Dropdown.init(elems, {});
        });
      </script>
      @yield('scripts')
</body>
</html>