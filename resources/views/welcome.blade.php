<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
       
      
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
   
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
        
   
            <div class="container">
                <div class="title m-b-md"> <h2></h2>ALL Jon Post</div>
                        <div class="col-lg-12">
                            @foreach($allpost as $row)

                                <div class="card">
                                    <div class="card-header">{{ $row->job_title }}</div>
                                    
                                        <div class="card-body">  
                            
                                            <h5><p> Company: {{$row->company->company_name}}</p></h5>
                                                
                                                <br>
                                                <span class="card-title"> {{$row->job_description}}</span>
                                                <br><p>Salery: {{$row->salery}}</p></br>
                                                <p> Location: {{$row->location}}</p>
                                                <br><p>Country: {{$row->country}}</p>

                                                <a href="{{ URL::to('/apply/forjob/'.$row->id)}}" class="btn btn-primary">Apply</a>
                                                </br></br>


                                                



                                        </div>
                                        
                                
                                </div>
                                        </br>
                                        </br>
                                @endforeach
                                    {{ $allpost->links() }}
                        </div>               
                    
                </div>
      
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </body>
  
</html>
