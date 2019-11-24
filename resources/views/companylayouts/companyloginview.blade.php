@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    <h2>Company Login </h2>
    <form action="{{ route('companylogin') }}" method="post">
   	@csrf
   	    
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="CompanyEmail" name="email" required/>
          
            </div>
          </div>
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Password</label>
              <input type="password"  class="form-control" placeholder="Password" name="password" required/>
          
            </div>
          </div>



          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
          
        </form>
    </div>
</div>
@endsection