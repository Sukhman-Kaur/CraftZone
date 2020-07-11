@extends('admin')
@section('admin_content')
<h4>List of Subscribers</h4>
    <table class="table  table-sm table-dark" style="color: whitesmoke; background:rgb(77, 76, 76); margin-top:3%;">
        <thead>
            <tr class="bg-primary">
              <th scope="col">Id</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
    @foreach($subscribers as $subscriber)
    <tr>
    <td>{{ $subscriber->id }}</td> 
    <td>{{ $subscriber->email }}</td> 
    </tr>
    @endforeach
    </table>
@endsection