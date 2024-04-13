<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserWelcomeMail;

class userManagecontroller extends Controller
{
    //
    public function showCreateForm()
    {
        $data = Task::selectRaw('MAX(id) as id, task_num')
        ->groupBy('task_num')
        ->orderBy('id', 'desc')
        ->get();
    
            return view("registeruser",['collection'=>$data]);
       
    }

    public function createUser(Request $request)
    {

        //public function adminview(Request $req)
            
        
      
        // Validate the request data as needed
        $request->validate([
            'email'=>[
                'required',
                'email',
                'regex:/\.(com|in|org|co|eu|edu)$/i',
                'unique:users'],
            'name' => 'required',
            'task_id' => 'required',
        ]);

        // Generate a random default password
        $randomPassword = Str::random(8);
      

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'task_id' => $request->task_id,
            'password' => Hash::make($randomPassword),
            'role' => 'user', // Assuming you have a 'role' column in your users table
        ]);

        // Send an email with the random default password to the user
        // Use Laravel's Mail functionality or a third-party service for sending emails
        Mail::to($user->email)->send(new NewUserWelcomeMail($user, $randomPassword));

        // Redirect back with a success message
        return redirect("/userdash")->with('success', 'User created successfully.');
    }

    public function userview(Request $req){
        $data = User::orderBy('id', 'desc')->get();//->paginate(3);

        return view("userlist",['collection'=>$data]);
    }


    public function deleteuser($id){
       
        $res=User::where('id',$id)->delete();
        if ($res=== 1) {
            return response()->json(['status'=>'success','code'=> 200, 'message'=>'Song deleted successfully.']);
        } else {
            return response()->json(['status'=>'error','code'=> 500, 'message'=>'Failed to delete advertisement']);
        }
    }
    

}

