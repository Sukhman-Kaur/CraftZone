<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

use DB;
use App\States;
use App\MainCategory;
use App\SubCategory;
use App\Advertisement;

class UsersController extends Controller
{
    public function index(){
        $categories=DB::table('main_categories')
                    ->select('main_categories.id','main_categories.mainCategory','icons.icons')
                    ->join('icons','icons.category_id','=','main_categories.id')
                    ->get();
        return view('users.user',['categories'=>$categories]);
    }
    public function fetch(Request $request){
        //echo "Success";
        if($request->get('indianStates')){
            $query=$request->get('indianStates');
            $data=DB::table('states')
                    ->where('state_name','like','%'.$query.'%')
                    ->get();
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $output='<ul style="display:block !important;" class="dropdown-menu">';
            if($data->count()>0){
                foreach($data as $row){
                    $output.='<li class="searchState" id="search" name="searchState" style="cursor:pointer;" value='.$row->id.'>'.$row->state_name.'</li>';
                }
                $output.='</ul>';
                echo $output;
            }        
            else{
                $output.='<li>Record not found!</li></ul>';
                echo $output;
            }
        }
    }
    public function cities(Request $request){
        if($request->get('id')){
            $query=$request->get('id');
            $data=DB::table('cities')
                    ->where('state_id',$query)
                    ->get();
            $output='';
         
            if($data->count()>0){
                foreach($data as $row){
                    $output.='<li id="searchCity" name="searchCity" style="cursor:pointer;">'.$row->city_name.'</li>';
                }
               // $output.='</ul>';
                echo $output;
            }        
            else{
                $output.='<li>City not found!</li></ul>';
                echo $output;
            }
        }
    }
    public function retrieve(Request $request){
        $data=DB::table('main_categories')->get();
        $output='';
         
        if($data->count()>0){
            foreach($data as $row){
                $output.='<option value='.$row->id.'>'.$row->mainCategory.'</option>';
            }
           $output.='';
            echo $output;
        }        
    }
    public function postad(){
        $categories=DB::table('main_categories')
        ->select('main_categories.id','main_categories.mainCategory','icons.icons')
        ->join('icons','icons.category_id','=','main_categories.id')
        ->get();
        return view('users.postad',['categories'=>$categories]);
    }
    public function categories(Request $request, $mainCategory, $id){
        // echo "$mainCategory";
        // echo '<br>';
        // echo "$id";
        $categories=DB::table('main_categories')
        ->select('main_categories.id','main_categories.mainCategory','icons.icons')
        ->join('icons','icons.category_id','=','main_categories.id')
        ->get();
        $subcategories=DB::table('main_categories')
        ->select('*')
        ->join('sub_categories','sub_categories.mainCategory_id','=','main_categories.id')
        ->where(['main_categories.id'=>$id])
        ->get();
        $states=States::all(); 

        if($id==2){
            return view('users.publishads.carbikesads',['categories'=>$categories,'subcategories'=>$subcategories,'states'=>$states]);
        }
        else if($id==3){
            return view('users.publishads.mobilestabletsads',['categories'=>$categories,'subcategories'=>$subcategories,'states'=>$states]);

        }
        else if($id==4){
            return view('users.publishads.electroAppliancesads',['categories'=>$categories,'subcategories'=>$subcategories,'states'=>$states]);

        }
        else if($id==5){
            return view('users.publishads.realestateads',['categories'=>$categories,'subcategories'=>$subcategories,'states'=>$states]);

        }
        else if($id==6){
            return view('users.publishads.servicesads',['categories'=>$categories,'subcategories'=>$subcategories,'states'=>$states]);

        }
    }
    public function postCrafts(Request $request){
        
    $this->validate($request,[
        'sub_category_id'=>'required',
        'product_name'=>'required',
        'customisation'=>'required',
        'expected_selling_price'=>'required',
        'owner_name'=>'required',
        'mobile'=>'required',
        'email'=>'required',
        'state'=>'required',
        'city'=>'required',
        'photos'=>'required',
        'photos.*'=>'image|mimes:jpg,png,jpeg,gif,svg'
    ]);
    $ads=new Advertisement;
    $images=$request->file('photos');
    $count=0;
    if($request->file('photos')){
        foreach($images as $item){
            if($count<4){
                $var=date_create();
                $date=date_format($var,'Ymd');
                $imageName=$date.'_'.$item->getClientOriginalName();
                $item->move(public_path().'/uploads/',$imageName);
                $url=URL::to("/").'/uploads/'.$imageName;
                $arr[]=$url;
                $count++;
            }
        }
        $image=implode(",",$arr);
        $ads->main_category_id=$request->input('main_category_id');
        $ads->sub_category_id=$request->input('sub_category_id');
        $ads->product_name=$request->input('product_name');
        $ads->customisation=$request->input('customisation');
        $ads->expected_selling_price=$request->input('expected_selling_price');
        $ads->owner_name=$request->input('owner_name');
        $ads->email=$request->input('email');
        $ads->mobile=$request->input('mobile');
        $ads->state=$request->input('state');
        $ads->city=$request->input('city');
        $ads->photos=$image;
        $ads->save();
        return redirect('/')->with('info','Advertisement submitted Successfully');
        // $data=array(
        //     'main_category_id'=> $ads->main_category_id,
        //     'sub_category_id'=> $ads->sub_category_id,
        //     'product_name'=> $ads->product_name,
        //     'year_of_purchase'=> $ads->year_of_purchase,
        //     'expected_selling_price'=> $ads->expected_selling_price,
        //     'owner_name'=> $ads->owner_name,
        //     'email'=> $ads->email,
        //     'mobile'=> $ads->mobile,
        //     'state'=> $ads->state,
        //     'city'=> $ads->city,
        //     'photos'=> $ads->photos
        // );
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }
    }
    public function getAds(){
       // echo "hello";
       $ads=DB::table('advertisements')->get();
       $output='';
       if($ads->count()>0){
            foreach($ads as $row){
                $output.='<div class="col-md-3" >
                    <div class="card text-center" id="card_box">
                    <img src='.strtok($row->photos,",").' class="card-img-top" style="padding:10px !important; width:100%;height:182px;"/>
                    
                    <p class="card-title">'.$row->product_name.'</p>
                    
                    <a href='.$_SERVER['HTTP_REFERER'].'product/view/'.$row->id.'><i class="fa fa-search-plus" aria-hidden="true"></i> VIEW</a>
                    </div></div>';
            }
            $output.='';
            echo $output;
       }
       else{
           $output.='<p>Not Found!</p>';
           echo $output;
       }
    }
    public function viewAds(Request $request,$mainCategory, $id){
        // echo "1 am here";
        // $data=array(
        //     'mainCategory' => $mainCategory,
        //     'id' =>$id,
        // );
        // echo '<pre>';
        // print_r($data);
        // echo'</pre>';
        $categories=DB::table('main_categories')
        ->select('main_categories.id','main_categories.mainCategory','icons.icons')
        ->join('icons','icons.category_id','=','main_categories.id')
        ->get(); 
        $carBikes=DB::table('advertisements')
            ->where(['main_category_id'=> $id])
            ->get();
        if($id==1){
           return $this->index();
        }
        if($id==2){
            return view('users.categories.carbikesads',['categories'=>$categories,'carBikes'=>$carBikes]);
        }
        else if($id==3){
            return view('users.categories.mobilestabletsads',['categories'=>$categories,'carBikes'=>$carBikes]);

        }
        else if($id==4){
            return view('users.categories.electroAppliancesads',['categories'=>$categories,'carBikes'=>$carBikes]);

        }
        else if($id==5){
            return view('users.categories.realestateads',['categories'=>$categories,'carBikes'=>$carBikes]);

        }
        else if($id==6){
            return view('users.categories.servicesads',['categories'=>$categories,'carBikes'=>$carBikes]);

        }
    }
    public function searchProduct(Request $request){
        //echo "Here";
        if($request->get('searchproduct')){
            $query=$request->get('searchproduct');
            //echo $query;
            $categories=DB::table('main_categories')
            ->select('main_categories.id','main_categories.mainCategory','icons.icons')
            ->join('icons','icons.category_id','=','main_categories.id')
            ->get();
            $data=DB::table('advertisements')
            ->where('product_name','like','%'.$query.'%')
            ->get();
            return view('users.categories.searchonproduct',['categories'=>$categories,'data'=>$data]);
        }
    }
    public function searchAdvertisements(Request $request){
       if($request->get('city') && $request->get('categories')){
            $category_id= $request->get('categories');
            $city=$request->get('city');
            $data=DB::table('advertisements')
                    ->where(['city'=>$city, 'main_category_id'=>$category_id])
                    ->get();
            $categories=DB::table('main_categories')
                    ->select('main_categories.id','main_categories.mainCategory','icons.icons')
                    ->join('icons','icons.category_id','=','main_categories.id')
                    ->get();
        return view('users.categories.searchonlocategories',['categories'=>$categories,'data'=>$data]);
      }
    }
    public function viewProduct(Request $request, $id){
        //echo $id;
        $categories=DB::table('main_categories')
                    ->select('main_categories.id','main_categories.mainCategory','icons.icons')
                    ->join('icons','icons.category_id','=','main_categories.id')
                    ->get();
        $product =DB::table('advertisements')
                    ->where(['id'=>$id])
                    ->get();
        return view('users.productView',['categories'=>$categories,'product'=>$product]);
    }
}
