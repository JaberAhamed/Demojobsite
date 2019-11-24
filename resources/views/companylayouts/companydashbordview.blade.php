@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <h2>Company Dashbord </h2>

    <a href="{{ route('allapplicant') }}" class="btn btn-primary">Show all Applicant</a>
    <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
    <a href="{{ route('jobpost') }}" class="btn btn-primary">job Post</a>
    
    
   
    </div>

    
</div>
@endsection



  