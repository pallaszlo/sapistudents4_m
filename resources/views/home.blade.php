@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Create student</a>

                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Név</th>                            
                            <th>Szak</th>
                            <th colspan="3">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studs as $stud)
                            <tr>
                                <td>{{$stud->id}}</td>
                                <td>{{$stud->name}}</td>
                                <td>{{$stud->program->description}}</td> 
                                <td><a href="{{ route('students.show',$stud->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Show</a></td>
                                <td><a href="{{ route('students.edit', $stud->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                                <td>
                                    <form action="{{ route('students.destroy',$stud->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
