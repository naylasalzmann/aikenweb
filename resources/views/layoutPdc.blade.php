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
  <!--TODO: cambiar el siguiente estilo a su propio file -->
  <style type="text/css">
    
    .is-concretada {

        text-decoration: line-through;

    }

    .text {
      display: block;
      width: 300px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }


    tr:hover { 
      background: 'light-blue';  
    } 

    td a { 
      display: block; 
    }

  </style>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

     
    <title>@yield('title', 'Panel de control')</title>
</head>
<body>

  <div class="container">
      <div class="row">
        <div class="col s3">
          
         <ul id="slide-out" class="sidenav sidenav-fixed">
            <li><div class="user-view">
              <div class="background">
                <img src="">
              </div>
              <a href="#user"><img class="circle" src=""></a>
              <a href="#name"><span class="grey-text name">Admin</span></a>
              <a href="#email"><span class="grey-text email">admin@gmail.com</span></a>
            </div></li>
            <li><a href="/pdc/dashboard"><i class="material-icons">cloud</i>Dashboard</a></li>
            <li><a href="/pdc/consultas">Consultas</a></li>
            <li><a href="/pdc/reservas">Reservas</a></li>
            <li><a href="/pdc/confirmaciones">Confirmaciones</a></li>
            <li><a href="/pdc/cancelaciones">Cancelaciones</a></li>
            <li><a href="/pdc/cobros">Mis cobros</a></li>
            <li><a href="/pdc/aventureros">Aventureros de aiken</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Soporte</a></li>
            <li><a class="waves-effect" href="/pdc/salidas">Salidas</a></li>
            <li><a class="waves-effect" href="/pdc/guias">Guías</a></li>
            <li><a class="waves-effect" href="/pdc/localidades">Localidades</a></li>
            <li><a class="waves-effect" href="/pdc/zonas">Zonas</a></li>
            <li><a class="dropdown-trigger" href="/pdc/localidades" data-target="dropdown1">Otros<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="/pdc/tiposSalida">Tipos de salida</a></li>
              <li><a href="/pdc/titulos">Títulos</a></li>
              <li><a href="/pdc/condiciones">Condiciones para reservar</a></li>
            </ul>
          </ul>
        </div>
        <div class="col s9">
          @yield('content')
       
        </div>
      </div>
   </div> 
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

     <!--JavaScript at end of body for optimized loading-->
      <script src="{{ asset('js/materialize.js') }}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.dropdown-trigger');
          var instances = M.Dropdown.init(elems, {});
        });
      </script>
      @yield('scripts')
</body>
</html>