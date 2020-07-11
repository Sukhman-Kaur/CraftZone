@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <strong>Categories</strong>
                    </div>
                    <div class="card-body cardcategories">
                        <ul class="userpgcategory fa-ul">
                            @if(isset($categories))
                                @if(count($categories)>0)
                                    @foreach($categories as $category)
                                        <li><a href="{{url('/viewAds/'.preg_replace('/\s+/','',$category->mainCategory).'/'.$category->id)}}">{!!html_entity_decode($category->icons)!!}{{$category->mainCategory}}</a></li>
                                    @endforeach
                                @else
                                @endif
                            @endif
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <strong>Advertisements</strong>
                    </div>
                    <div class="card-body" style="background-color:rgb(49, 48, 48);">
                        @if(isset($product))
                            @if(count($product)>0)
                                @foreach($product as $ad)
                                    <?php
                                        $img=[];
                                        $img=explode(",",$ad->photos);
                                        // echo '<pre>';
                                        // print_r($img);
                                        // echo '</pre>';
                                    ?> 
                                    <div class="row" style="overflow: hidden; padding:20px;">
                                        <div class="col-lg-6">
                                            <div class="row featured" id="featured-image">
                                            <img src="{{$img[0]}}" alt="" width="100%" height="300px"/>
                                            <p>
                                                @if(isset($img[1]))
                                                    <img src="{{$img[1]}}" alt="" width="30%" height="120px"/>
                                                @endif
                                                @if(isset($img[2]))
                                                    <img src="{{$img[2]}}" alt="" width="30%" height="120px"/>
                                                @endif
                                                @if(isset($img[3]))
                                                    <img src="{{$img[3]}}" alt="" width="30%" height="120px"/>
                                                @endif
                                            </p>
                                        </div> 
                                        </div>
                                        <div class="col-lg-6"  style="margin-bottom: -99999px;padding-bottom: 99999px;">
                                           <div class="card border-secondary " style="max-width:100%;">
                                            <div class="card-header" >Product Details</div>
                                            <div class="card-body" style="background-color: rgb(48, 47, 47); color:white; border-top:5px solid rgb(223, 106, 28);">
                                                <h5>Name:
                                                    <span title="xtra large">{{$ad->product_name}}</span>
                                                </h5>
                                                <hr>
                                                <h5>Customisation Available:
                                                    <span title="xtra large">{{$ad->customisation}}</span>
                                                </h5>
                                                <hr>
                                                <h5>Price:
                                                    <span title="xtra large">{{$ad->expected_selling_price}}</span>
                                                </h5>
                                            </div>
                                           </div>
                                           <br>
                                           <div class="card border-secondary wb-3" style="max-width:100%;">
                                            <div class="card-header ">Seller Details</div>
                                            <div class="card-body" style="background-color: rgb(48, 47, 47); color:white; border-top:5px solid rgb(223, 106, 28);">
                                                <h5>Name:
                                                    <span title="xtra large">{{$ad->owner_name}}</span>
                                                </h5>
                                                <hr>
                                                <h5>Mobile:
                                                    <span title="xtra large">{{$ad->mobile}}</span>  
                                                
                                                    <a href="https://api.whatsapp.com/send?phone=91+{{$ad->mobile}}+&text=I'm%20interested%20in%20your%20craft%20product%20for%20sale" target="_blank">
                                                    <i class="fab fa-whatsapp" style="color: rgb(19, 224, 19);"></i>
                                                    </a>
                                                </h5>
                                                <hr>
                                                <h5>Email:
                                                    <span title="xtra large">{{$ad->email}} <a href="{{url('/sendemail')}}"><i class="fa fa-envelope" aria-hidden="true" style="font-size:17px;color:rgb(223, 105, 28)"></i></a>
                                                    </span>
                                                </h5>
                                                {{-- <hr>
                                                <h5>City:
                                                    <span title="xtra large">{{$ad->city}}</span>
                                                </h5> --}}
                                            </div>
                                           </div> 
                                        </div>
                                    </div>
                                    @endforeach
                            @else
                                <p>Not Found !!</p>
                            @endif   
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
