<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
 

    <title></title>

    <!-- Scripts -->
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Styles -->
   
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class=" dropdown-toggle" data-toggle="dropdown" href="#"><span >Register</span></a>
                <ul class="dropdown-menu">
                <li><a href="{{ route('companyregister') }}">Company Register</a></li>
                <li><a href="{{ route('userregister') }}">User Register</a></li>
                
                </ul>
            </li>
            <li class="dropdown"><a class=" dropdown-toggle" data-toggle="dropdown" href="#"><span >Login</span></a>
                <ul class="dropdown-menu">
                <li><a href="{{ route('companyloginview')}}">Company Login</a></li>
                <li><a href="{{ route('userloginview')}}">User Login</a></li>
                
                </ul>
            </li>
            
            </ul>
        
        </div>
    </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
     <script>
       @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif

  </script>
</body>
</html>
