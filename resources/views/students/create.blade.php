@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
  

<div class="col-md-8">
<div class="card uper">
  <div class="card-header">
    Add Student
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
      <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">              
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="name">Program:</label>           
              <select name="program" class="pull-right form-control">
                  @foreach($programs as $program)
                      <option value="{{$program->id}}">{{$program->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="status">Status:</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <div class="form-group">
              <label for="picture">Picture:</label>
              <input type="file" class="form-control" name="picture"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
</div>
  </div>
</v-container>
@endsection