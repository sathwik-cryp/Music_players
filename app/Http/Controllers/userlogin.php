<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userlogin extends Controller
{
    //

    function loginpost(Request $req){
            $req->validate([
                'email'=>'required',
                'password'=>'required'
            ]);

            $user=User::where('email','=',$req->email)->first();
       
            if($user)
            {
                if(Hash::check($req->password,$user->password))
                {

                    return redirect('home');
                }
                else{
                    return back()->with('error','wrong password');
                }

            }
            else{
                return back()->with('error','email is not registered');
            }

           


        
        }
    
            
    
        
    function login()
    {
        return view('userlogin');
    }


}
