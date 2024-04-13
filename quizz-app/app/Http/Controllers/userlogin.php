<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Test_number;

class userlogin extends Controller
{
    public function loginview()
    {
        return view('userlogin');
    }

    public function login(Request $req){
       
        $req->validate([
            'email'=>[
                'required',
                'email',
                'regex:/\.(com|in|org|co|eu|edu)$/i'],
            'password'=>'required'
        ]);
        $user=User::where('email','=',$req->email)->first();
        //dd($user);
       // dd($user[0]->name);
        if($user){
           if(Hash::check($req->password,$user->password)){
              $req->session()->put('loginId',$user->id);
              $testNum = Test_number::create([
                'userr_id' => $user->id,
               
            ]);
            $testNum->save();//when user logs in, i am storing the info in a session, so that we dont need to log in repeatedly
              if(session()->has('adminId'))session()->pull('adminId',null);
              return redirect("userinstruct");
          }
           else{
            return back()->with('fail','Wrong password');
           }
        }
        else{
            return back()->with('fail','Email does not exist.');
        }
        //session(['quiz_completed' => null]);//own
    }

    public function loginstart()
    {
        $userId = session('loginId');
        $user = User::find($userId);
// dd($userId);
        if ($user) {
            $userName = $user->name;
            $taskId = $user->task_id;

            // Now you can use $userName and $taskId as needed in your logic
            // ...

            return view('userinstruct', ['userName' => $userName, 'taskId' => $taskId]);
        } else {
            // Handle the situation where the user is not found
            // ...

            return redirect()->route('login'); // Redirect to the login page, for example
        }
    }
    
    
}
