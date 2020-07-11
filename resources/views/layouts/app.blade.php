<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CraftZone</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
</head>
<body  style="background-color: rgb(45, 45, 45);">
    <div id="app">
        <div class="fixed top" style="position:fixed;left:0;top:0;width:100%;z-index:2;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: rgb(57, 57, 57) !important; border-bottom:5px solid rgb(223, 106, 28);">
            
                <div class="col-lg-3">
                    <div class="row">
                        <a class="navbar-brand" href="{{ url('/') }}" style="color: #fff;font-size:28px;">
                            <img src="/img/craft_logo.png" style="position:fixed;left:0;top:0;" height=70>
                        </a> 
                        {{-- <a class="navbar-brand" href="{{ url('/') }}" style="color: #fff;font-size:28px;">
                            CraftZone</a>       --}}
                        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                           

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}" style="color: #fff;">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" style="color: #fff;" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(57,57,57)">
                                            <a class="dropdown-item" href="{{ route('logout') }}" style="color: white;"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ url('/') }}" style="color: white;">
                                                {{ __('Profile') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    
                                @endguest
                                <li style="margin-top:9px;"><a href='{{url('/post-classified-ads')}}' style="color: #fff;text-decoration: none;">Add Post</a></li>
                            </ul>
                        </div>  --}}
                    </div>  
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-4">
                        <form class="form-horizontal" method="post" action="{{url('/product/search')}}">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-8 mx-0">
                                    <input type="text" name="searchproduct" style="margin-top: 5px;" class="form-control" placeholder="Enter Product">
                                </div>
                                <div class="col-4">
                                    <button type="submit" name="" style="margin-top: 5px;" value="" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="col-lg-8" >
                            <form class="form-horizontal" method="post" action="{{url('/search/advertisements')}}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <input type="text" style="margin-top: 5px;" name="states" id="state" class="form-control" placeholder="Enter State">
                                    <div id="stateList"></div>
                                    <div id="cityList" 
                                    style="display:block; 
                                          position:absolute;
                                          border-radius:0px;
                                          background: #fff;
                                          width:88%;
                                          padding: 0px 13px;
                                          overflow-y:auto;
                                          z-index:1;
                                          "></div>
                                          <input type="text" name="city" id="city" style="background: rgb(57,57,57);border:1px solid rgb(57,57,57);color:#fff;">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control dropdown" name="categories" style="margin-top: 5px;" id="categories" class="categories">
                                        <option>Select</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" name="searchads" class="btn btn-default" value="Search" style="margin-top: 5px;">
                                    </div>
                                </div>
                           </form> 
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 collapse navbar-collapse">
                    
                    <ul class="navbar-nav" style="float: right;">
                              
                        {{-- <li class="nav-item">
                            <a style="color: white;" class="nav-link">
                                    <i class="fa fa-home" aria-hidden="true" style="color: #fff;"></i> About
                                </a>
                        </li> --}}
                        @guest
                        <li class="nav-item" style="font-size:20px">
                            <a style="color: white;" class="nav-link" href="{{ route('login') }}" ><i class="fa fa-users" aria-hidden="true" style="color: #fff;"></i>  {{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color: #fff;" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(57,57,57)">
                                <a class="dropdown-item" href='{{url('/post-classified-ads')}}' style="color: #fff;text-decoration: none;">
                                    {{ __('Add Post') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" style="color: white;"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/') }}" style="color: white;">
                                    {{ __('Profile') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    
                </ul>
                </div>
            
            
        </nav>
    </div>

        <main class="py-3" style="position: relative; top:100px;">
            @yield('content')
        </main>
        <footer class="py-2">
            @include('layouts/footer')
        </footer>
    </div>
</body>
</html>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
    $("#state").keyup(function(){
        var data;
        var indianStates=$(this).val();
        //alert(indiaStates);
        if(indianStates!=''){
            var _token=$('input[name="_token"]').val();
            $.ajax({
               url: "{{ route('searchlocation.fetch') }}",
               method: "POST",
               data: {indianStates:indianStates,_token:_token},
               success: function(data){
                   $('#stateList').fadeIn();
                   $('#stateList').html(data);
               } 
            });
        }else{
            $('#stateList').fadeOut();
            $('#stateList').html(data);
        }
  });
  $(document).on('click','#search',function(){
    $('#state').val($(this).text());
    $('#stateList').fadeOut();
  });
});
$(document).on('click','#stateList ul li',function(){
    var state=$('#state').val();
    var id=$(this).val();
    var _token=$('input[name="_token"]').val();
    $.ajax({
               url: "{{ route('state.cities') }}",
               method: "POST",
               data: {id:id,_token:_token},
               success: function(data){
                $('#cityList').fadeIn();
                $('#cityList').html(data);
               } 
            });
});
$(document).on('click','#cityList',function(e){
    var txt=$(e.target).text();
    $('#city').fadeIn();
    $('#city').val(txt);
    $('#cityList').fadeOut();
  });
  $(document).ready(function(){
    var _token=$('input[name="_token"]').val();
    $.ajax({
               url: "{{ route('categories.retrieve') }}",
               method: "POST",
               data: {_token:_token},
               success: function(data){
                $('#categories').fadeIn();
                $('#categories').html(data);
               } 
            });
  });
  $(document).ready(function(){
      if(window.location=="http://127.0.0.1:8000/" || window.location=="http://127.0.0.1:8000/viewAds/AllCategories/1"){
        var _token=$('input[name="_token"]').val();
        $.ajax({
               url: "{{ route('categories.ads') }}",
               method: "GET",
               data: {_token:_token},
               success: function(data){
                $('#Advertisements').html(data);
                //alert(data);
               } 
            });
      }
    
  });
</script>
