@extends('layouts.header')
@section('content')

<div class="col-lg-4 col-lg-offset-3 card"  style="width:50%;background:rgb(56, 56, 56); box-shadow:3px 5px whitesmoke;color:whitesmoke;margin-top:10%">
    @if ($message = Session::get('data'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @else
    <form action="{{ url('/subscribe') }}" method="post" >
        <div class="form-group">
            <br>
            <div class="card title" style="text-align:center;border-bottom:1px solid orange; background:rgb(56, 56, 56);"><label for="exampleInputEmail" style="font-size:26px;">Subscribe for our weekly updates</label><br>
            </div>
        <br><BR>
            Enter Email id:<input type="email" name="user_email" id="exampleInputEmail" class="form-control"> 
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
    @endif
</div>
@endsection
