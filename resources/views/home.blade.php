@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="border-bottom:3px solid orange;font-weight:bold;">Dashboard</div>

                {{-- <div class="card-body">
                    
                </div> --}}
                
                <div class="card-body"  style="background-color:rgb(57,57,57);color:whitesmoke">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    You are logged in!
                    @endif
                    @if(auth()->user()->is_admin == 1)
                    <h3>Welcome Admin</h3>
                    <h4><a href="{{url('admin_home')}}" style="color:rgb(241, 159, 6)">Click here for admin dashboard</a>
                    </h4>
                    @else
                <div class="panel-heading"><h3>Welcome {{auth()->user()->name}}
                </h3><br>
                    Now you can post, browse craft ads easily<br>
                    <p style="color: orangered">Happy Crafting!!</p>
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
