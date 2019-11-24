@extends('layouts.app')

@section('content')
<div class="container">


<table class="table table-border">

	 			@foreach($alljobpostapplicant as $row)
	 			<tr>
		 			
                    <th>Applicant Name</th>
		 			
		 			
	 			</tr>
	 			
	 			<tr>
                  
	 				<td>{{ $row->User->first_name }}</td>
	 				
	 				
	 				
	 			</tr>
	 			@endforeach
	 	
	 			
	 		</table>
    
</div>
@endsection



  