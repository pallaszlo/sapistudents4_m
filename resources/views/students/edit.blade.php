@extends('layouts.app')

@section('content')
<div class="row justify-content-center">

<div class="col-md-6">
<div class="card uper">
  <div class="card-header">
    Edit Student
  </div>
    <div class="card-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <form method="post" action="{{ route('students.update', $id) }}" >
        @csrf        
        <div class="form-group">            
            <label for="title">Név:</label>
            <input type="text" class="form-control" name="name" value="{{$stud->name}}" />
        </div>
        <div class="form-group">            
            <label for="title">E-mail cím:</label>
            <input type="email" class="form-control" name="email" value="{{$stud->email}}" />
        </div>
         <div class="form-group">            
            <label for="title">Status:</label>
            <input type="text" class="form-control" name="status" value="{{$stud->status}}" />
        </div>        
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
  
</div>
</div>
</div>
@endsection