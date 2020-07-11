<html>
    <head>
        <style type="text/css">
            .box{
             width:600px;
             margin:0 auto;
             border:1px solid #ccc;
            }
            .has-error
            {
             border-color:#cc0000;
             background-color:#ffff99;
            }
           </style>
           <link href="{{ asset('css/app.css') }}" rel="stylesheet">
           <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet">
           <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    </head>
<body style="background-color: rgb(45, 45, 45);">
    <div id="app"  style="position:fixed;left:0;top:0;width:100%">
        <div class="fixed top">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: rgb(57, 57, 57) !important; border-bottom:5px solid rgb(223, 106, 28); height:10%">
            
                <div class="col-lg-2">
                    <div class="row">
                        <a class="navbar-brand" href="{{ url('/') }}" style="padding: 0px">
                            <img src="/img/craft_logo.png" height="50"style=""></a>     
                    </div>  
                </div>
        </nav></div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="py-1">
        @include('layouts/footer')
    </footer>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    $(document).on('click','#stateList ul li',function(){
    var state=$('#state').val();
    var id=$(this).val();
    var _token=$('input[name="_token"]').val();
    $.ajax({
               url: "{{ route('state.cities') }}",
               method: "POST",
               data: {id:id,_token:_token},
               success: function(data){
                $('#state').val(data);
                
               } 
            });
});
</script>
