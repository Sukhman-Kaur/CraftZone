@extends('admin')
@section('admin_content')
<h4>List of Registered Users</h4>
@if($message=="Success")
    <div class="bg-success">{{$message}}</div>
@elseif($message=="Failed")
    <div class="bg-danger">{{$message}}</div>
@else
@endif
    
    <table class="table  table-sm table-dark" style="color: whitesmoke; background:rgb(77, 76, 76); margin-top:3%">
        <thead>
            <tr class="bg-primary">
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Delete</th>
              {{-- <th scope="col">View</th> --}}
            </tr>
          </thead>
    @foreach($users as $user)
    <tr>
    <td>{{ $user->id }}</td> 
    <td>{{ $user->name }}</td> 
    <td>{{ $user->email }}</td>
    <td><a href="delete/{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true" style="color: rgb(248, 19, 19)"></i></a></td>
    {{-- <td><i class="fa fa-eye" aria-hidden="true" style="color: rgb(233, 247, 43)"></i></td> --}}
    </tr>
    @endforeach
    </table>
@endsection