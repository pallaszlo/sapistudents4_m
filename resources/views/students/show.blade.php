@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card uper">
  			<div class="card-header">
    		<i class="fa fa-list-alt fa-lg"></i> Details
  			</div>
  			<div class="card-body">
  				@if ($student->picture==null)
  					<img alt="Card image cap" height='150px' src="{{asset('storage/pictures/placeholder.jpg') }}">
  				@else
  					<img alt="Card image cap" height='200px' src="{{asset('storage/pictures/'.$student->picture) }}">
  				@endif
  	
  				<table class="table table-bordered">
                	<thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                           <td><i class="fa fa-arrow-circle-right"></i> ID</td>
                           <td>{{$student->id}}</td>
                        </tr>
                   	    <tr>
                           <td><i class="fa fa-arrow-circle-right"></i> Name</td>
                           <td>{{$student->name}}</td>
                        </tr> 
                  	    <tr>
                           <td><i class="fa fa-arrow-circle-right"></i> Email</td>
                           <td>{{$student->email}}</td>
                        </tr>      
                        <tr>
                           <td><i class="fa fa-arrow-circle-right"></i> Program</td>
                           <td>{{$student->program->description}}</td>
                        </tr>   
                       <tr>
                           <td><i class="fa fa-arrow-circle-right"></i> Status</td>
                           <td>{{$student->status}}</td>
                        </tr>                         
                    </tbody>
                </table>				
			</div>
		</div>
	</div>
</div>
@endsection