@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>

</br>
</br>
</br>
    

    <form action="{{route('jobpostinfostore')}}" method="post">
   	@csrf
   	      <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Job title</label>
                    <input type="text" class="form-control" placeholder="title" name="job_title" required >
                
                </div>
          </div>

          <div class="form-group floating-label-form-group controls">
              <label>Job Description</label>
              <textarea rows="5" class="form-control" placeholder="Details" name='job_description' required></textarea>
          
            </div>
          <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Salery</label>
                    <input type="text" class="form-control" placeholder="salary" name="salery" required >
                
                </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Location</label>
              <input type="text" class="form-control" placeholder="location" name="location" required/>
          
            </div>
          </div>
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Country</label>
              <input type="text"  class="form-control" placeholder="country" name="country" required/>
          
            </div>
          </div>



          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Post</button>
          </div>
          
        </form>
</div>
@endsection



  