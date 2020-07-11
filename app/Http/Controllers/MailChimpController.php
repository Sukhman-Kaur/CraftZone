<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
use DB;
class MailChimpController extends Controller
{
    public function index(){
        return view('mailchimp');
    }
    public function manageMailChimp(Request $request){
    if ( ! Newsletter::isSubscribed($request->user_email) ) {
        //Newsletter::subscribePending($request->user_email); set status to pending in mail list
        //to create audience with parameters
        //Newsletter::subscribe($request->user_email, ['FNAME'=>'ENTER_FIRST_NAME', 'LNAME'=>'ENTER_LAST_NAME']);
        Newsletter::subscribe($request->user_email);
        $data="Thanks for Subscribing";
        $val=array("email"=>$request->user_email);
        DB::table('subscribers')->insert($val);
    }
    else{
        $data="Already Subscribed";
    }
    //dd($data);
    return back()->with('data',$data); 
}

//delete user from list
// Newsletter::delete('SUBSCRIBER_EMAIL');
}
