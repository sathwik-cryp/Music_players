<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use App\Models\Admin;
use App\Models\Question;
use App\Models\Admin_message;

class admincontrol extends Controller
{
    public function login(Request $req){
        $req->validate([
            'username'=>'required', 
            'password'=>'required'
        ]);
        $admin=Admin::where('email','=',$req->username)->first();
        //dd($admin);
        if($admin){
             if($admin->password===$req->password){
                $req->session()->put('adminId',$admin->id);
                  return redirect("/taskmanage");
             }
             else{
                return back()->with('fail','Wrong password');
             }
        }
        else {
            return back()->with('fail','username doesnt exist');
        }

    }

    public function adminview(Request $req){
        $data = Question::orderBy('id', 'desc')->get();//->paginate(3);

        return view("admindashboard",['collection'=>$data]);
    }


    public function userMessage(Request $req){
        $data = Admin_message::orderBy('user_id', 'asc')->paginate(5);//->get();
        return view("userresult",['collection'=>$data]);

    }


    
}

