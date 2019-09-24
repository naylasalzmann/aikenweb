   
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
    <a href="/">Home</a>		
    <h2>aiken layout</h2>
    @yield('content')

     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>


    
