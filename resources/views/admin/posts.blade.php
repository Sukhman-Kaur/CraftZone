@extends('admin')
@section('admin_content')
<h3>Craft Advertisements</h3>
@if($message=="Success")
    <div class="bg-success">{{$message}}ly deleted!</div>
@elseif($message=="Failed")
    <div class="bg-danger">{{$message}} to delete advertisement</div>
@else
@endif
    
    <table class="table  table-sm table-dark" style="color: black;font-size:20px;  vertical-align: middle;
    background:rgb(124, 122, 122); margin-top:3%">
        <thead>
            <tr class="bg-primary">
              <th scope="col">Id</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
              <th scope="col">Images</th>
              <th scope="col">Location</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
    @foreach($products as $product)
    <tr>
    <td style="vertical-align: middle;">{{ $product->id }}</td> 
    <td style="vertical-align: middle;">{{ $product->product_name }}</td> 
    <td style="vertical-align: middle;">{{ $product->expected_selling_price }}</td>
    <td>
    <?php
        $img=[];
        $img=explode(",",$product->photos);
    ?>                               
    <img src="{{$img[0]}}" alt="" width="70px" height="70px"/>
    @if(isset($img[1]))
        <img src="{{$img[1]}}" alt="" width="70px" height="70px"/>
    @endif
    @if(isset($img[2]))
        <img src="{{$img[2]}}" alt="" width="70px" height="70px"/>
    @endif 
    @if(isset($img[3]))
        <img src="{{$img[3]}}" alt="" width="70px" height="70px"/>
    @endif                                           
    </td>
    <td style="vertical-align: middle;">{{ $product->city }}</td>
    <td style="vertical-align: middle;"><a href="delete_ad/{{ $product->id }}"><i class="fa fa-trash" aria-hidden="true" style="color: rgb(248, 19, 19)"></i></a></td>
</tr>
    @endforeach
    </table>
@endsection