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
                <div class="card border-0">
                    <div class="card-body"  id="ad_card">
                        <div class="row">
                           @if(count($data)>0)
                            @foreach($data as $row)
                            <div class="col-md-3">
                                <div class="card text-center" id="card_box">
                                    <img src=<?php echo strtok($row->photos,',')?>  class="card-img-top" style="padding:10px !important;width:100%;height:182px; border-radius:10%;"/>
                                    <h4 class="card-title">{{$row->product_name}}</h4>
                                <a href='{{url("/product/view/{$row->id}")}}' style="text-decoration: none;"><i class="fa fa-search-plus" aria-hidden="true"></i> VIEW</a>
                                </div>
                                </div>
                            @endforeach
                           @else
                                <p>Not Found!!</p>
                           @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
