<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userRegistrationcontroller extends Controller
{
    //

    function registration(){
        // if (Auth::check()){
        //     return redirect(route('home'));

        // }
        return view('userRegister');
    }  


    function registrationpost(request $req){

       

        $req->validate([
            'name'=>'required',
            // 'phone_number'=>['required','regex:/^[6-9][0-9]{9}$/'],
            'email'=>['required',
            'email',
            'regex:/\.(com|in|org)$/i',
            'unique:users'],
            'password'=> [
                'required',
                'min:6',
                'max:128',
                'regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$@&`#%]).*$/'
            ],
            // 'confirm_password'=>'required|same:password'

        ]);

        $user = new User(); 
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password =Hash::make($req->password);
        $res=$user->save();

        if($res)
        {
            return back()-> with('success','you have sucessfully registered');
        }
        else{
            return back()->with('error','something wrong');
        }





     
    }
    // function logout(){
    //     Session::flush();
    //     Auth::logout();
    //     return redirect(route('login'));
    // }

    // function fist()
    // {
    //     $coll=Ad::all();
    //     return view('adviewadmin',["collection"=>$coll]);
    // }

    // function list()
    // {
    //     $data=Ad::all();
    //     $data=Ad::orderby('ad_date','asc')->paginate(5);
     
        
    //     return view('adforuser',["data"=>$data]);
    // }


    // function add(Request $req){
    //     $logo=$req->file('logo')->store('images/logos','public');
    //     $img=$req->file('image')->store('images/adimages','public');
    //     $ad = new Ad();
    //     $ad->ad_name = $req->input('ad_name');
    //     $ad->ad_logo = file('ad_logo');
    //     $ad->ad_text = $req->input('ad_text');
    //     $ad->ad_image = file('ad_image');
    //     $ad->ad_date = $req->input('ad_date');
    
    //     $ad->save();

    // public function add(Request $req){


        // $req->validate([
        //     'ad_name'=>'required|alpha',
        //     'ad_logo'=>'required|mimes:jpeg,png,jpg,gif,webp',
        //     'ad_text'=>'required|max:500',
        //     'ad_image'=>'required|mimes:jpeg,png,jpg,gif,webp',
        //     'ad_date'=>'required','date','date_format:Y/m/d',
        // ]);
        // dd($req->file('ad_logo'));
       
        // $logoPath = $req->file('ad_logo')->store('images\logos', 'public');
        // $imagePath = $req->file('ad_image')->store('images\adimages', 'public');
    
        // $ad = new Ad();
        // $ad->ad_name = $req->input('ad_name');
        // $ad->ad_logo = $logoPath;
        // $ad->ad_text = $req->input('ad_text');
        // $ad->ad_image = $imagePath;
        // $ad->ad_date = $req->input('ad_date');

        // $ad->ad_date = Carbon::parse($req->input('ad_date'))->format('d-m-Y');
    //   $ad->ad_date ;
        // $ad->save();
        // return redirect('adminview');
    
        
    // }

    
    // ->toDateString()
}

