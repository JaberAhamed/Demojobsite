@extends('layouts.app')
@section('content')
@parent
 <div class="container">
 	
 <a href="{{ route('userlogout') }}" class="btn btn-primary">Logout</a>

 	<div>
 		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
      @endif
 	</div>
   <form  action="{{route('udateUserProfile')}}"  method="post" enctype="multipart/form-data">
   	@csrf
         
          
       
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image upload</label>
              <input type="file"  placeholder="imageupload" name='image'>
            </div>
          </div>

           
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Resume</label>
              <input type="file"  placeholder="resume" name='resume'>
            </div>
          </div>
          </br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Add</label>
              <input type="text" class="form-control" placeholder="add skill" name="skills" required/>
          
            </div>
          </div>

          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>  
@endsection