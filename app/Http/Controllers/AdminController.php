<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class AdminController extends Controller
{
    var $message="";
    public function users(){
        $users=DB::table('users')
                    ->select('id','name','email')
                    ->where('is_admin','0')
                    ->get();
        return view('admin.users',['users'=>$users,'message'=>$this->message]);
    }
    public function delete($id) {
        // $test=User::find($id);
        // $test->delete($id);
        $val=DB::table('users')->where('id', '=', $id)->delete();
        if($val==0){
           $this->message="Failed";
        }
        else{
            $this->message="Success";
        }
        return $this->users();
        //return route('registered_users');

     }
     var $ad_result="";
    public function posts(){
        $products=DB::table('advertisements')
                    ->select('id','product_name','expected_selling_price','photos','city')
                    ->get();
        return view('admin.posts',['products'=>$products,'message'=>$this->ad_result]);
    }
    public function delete_ad($id){
        $val=DB::table('advertisements')->where('id', '=', $id)->delete();
        if($val==0){
           $this->ad_result="Failed";
        }
        else{
            $this->ad_result="Success";
        }
        return $this->posts();  
    }
    public function subscribers(){
        $subscribers=DB::table('subscribers')
                    ->select('id','email')
                    ->get();
        return view('admin.subscribers',['subscribers'=>$subscribers]);
    }
}
