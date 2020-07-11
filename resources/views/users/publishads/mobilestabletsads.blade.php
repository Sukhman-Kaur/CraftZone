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
                                        <li><a href="{{url('/post-classified-ads/'.preg_replace('/\s+/','',$category->mainCategory).'/'.$category->id)}}">{!!html_entity_decode($category->icons)!!}{{$category->mainCategory}}</a></li>
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
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home">Cards & Boxes</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div id="home">
                                
                            </div>
                        </div>
                            <div id="myTabContent" class="tab-content">
                             <div class="" id="home">
                                 <h1 style="padding:10px 10px;" id="selcatmsg"></h1>
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/postCarsBikes') }}" style="padding-left: 20px;">
                                    {{csrf_field()}}    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if(count($errors)>0)
                                               @foreach($errors->all() as $error)
                                                {{-- {{$error}} --}}
                                               @endforeach 
                                            @endif
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                        <input type="hidden" name="main_category_id" value={{Request::segment(3)}}>
                                        <label><strong>Select SubCategory</strong></label>
                                        <select class="form-control" name="sub_category_id">
                                            <option value="">Select</option>
                                            @if(count($subcategories)>0)
                                                @foreach($subcategories as $subcategory)
                                                    <option value={{$subcategory->id}}>{{$subcategory->subCategory}}</option>
                                                @endforeach
                                            @else
                                            @endif
                                        </select>
                                        </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('sub_category_id'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('sub_category_id')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Product Name</strong></label>
                                                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                            </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('product_name'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('product_name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                        <label><strong>Can be customised?</strong></label><br>
                                        <label class="radio-inline"><input type="radio" name="customisation">YES</label>
                                        <label class="radio-inline"><input type="radio" name="customisation">NO</label>
                                        </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('customisation'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('customisation')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Expected Selling Price</strong></label>
                                                <input type="text" class="form-control" name="expected_selling_price" placeholder="Expected Selling Price">
                                            </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('expected_selling_price'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('expected_selling_price')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                        <label><strong>Your Name</strong></label>
                                        <input type="text" class="form-control" name="owner_name" placeholder="Your Name">
                                        </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('owner_name'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('owner_name')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Your Mobile</strong></label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Your Mobile">
                                            </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('mobile'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('mobile')}}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                        <label><strong>Your Email</strong></label>
                                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                                        </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('email'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                {{-- <input type="hidden" name="state" value={{Request::segment(3)}}> --}}
                                                <label><strong>State</strong></label>
                                                <select class="form-control" name="state">
                                                    <option value="">Select</option>
                                                    @if(count($states)>0)
                                                    @foreach($states as $state)
                                                        <option value={{$state->id}}>{{$state->state_name}}</option>
                                                    @endforeach
                                                @else
                                                @endif
                                                </select>
                                            </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('state'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('state')}}</span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                        <label><strong>City</strong></label>
                                        <input type="text" class="form-control" name="city" placeholder="Enter Your City">
                                        </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('city'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('city')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label><strong>Photos of your Crafts (Max 4)</strong></label>
                                                <input type="file" class="form-control" name="photos[]" multiple="true">
                                            </div>
                                        </div>
                                        <label style="padding:23px;"></label>
                                        @if($errors->has('photos'))
                                        <span class="alert alert-danger" style="margin-left:13px;padding:5px;">{{$errors->first('photos')}}</span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group" style="text-align: center;">
                                            <button type="submit" class="btn btn-primary">Post Your Add</button>
                                            <button id="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
