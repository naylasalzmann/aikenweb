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
    

     
    <title>@yield('title', 'Panel de control')</title>
</head>
<body>

       <ul id="slide-out" class="sidenav sidenav-fixed">
          <li><div class="user-view">
            <div class="background">
              <img src="">
            </div>
            <a href="#user"><img class="circle" src=""></a>
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
          </div></li>
          <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
          <li><a href="#!">Second Link</a></li>
          <li><div class="divider"></div></li>
          <li><a class="subheader">Subheader</a></li>
          <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
          <li><a class="waves-effect" href="/pdc/localidades">Mis localidades</a></li>
        </ul>
      @yield('sidenav')
      @yield('content')

     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>