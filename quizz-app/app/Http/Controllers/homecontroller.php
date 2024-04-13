<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Question;
use Session;
use App\Models\User;
use App\Models\Task;
use App\Models\Test_number;
use App\Models\Answer;
use App\Models\Admin_message;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendresult;

class homecontroller extends Controller
{
    //
   
    
        public function index()
        {
            // Get the user ID from the session
            $id = Session::get('loginId');
    
            // Fetch user using the ID
            $user = User::find($id);
            $taskId = $user->task_id;
            // dd($taskId);
    
            // Check if the user exists
           // if ($user) {
            if($taskId) {
                //$tasks = Task::where('task_num', $taskId)->get();
                $tasks = Task::where('task_num', $taskId)->paginate(1);
                // dd($tasks);
                // Fetch questions associated with the user
               // $questions = Question::orderby('id','asc')->paginate(1);

                // return view('home', ['collection'=>$questions]);
                return view('home', ['collection'=>$tasks]);
            } else {
                // Handle the case where the user is not found
                return redirect()->route('login')->with('error', 'User not found.');
            }
        }


        public function submitAnswers(Request $request)
        {
            // Validate the incoming request data if needed
            $request->validate([
                'question_id' => 'required|integer',
                'selected_option' => 'required|string',
                // Add other validation rules as needed
            ]);

            $id = Session::get('loginId');
            $user = User::find($id);
    
            // Extract data from the request
            $questionId = $request->input('question_id');
            $selectedOption = $request->input('selected_option');
           // dd($questionId);
            $question = Question::find($questionId);

            if (!$question) {
                return response()->json(['error' => 'Question not found'], 404);
            }

            $isCorrect = $question->correct_option === $selectedOption;
            // $latestTestNo = Test_number::where('userr_id', $user)->max('test_no');
            $latestTestNo = Test_number::where('userr_id', $id)->max('test_no');

            // dd($latestTestNo);

            $answer = Answer::create([
                'user_id'=>$id,
                'question_id' => $questionId,
                'selected_option' => $selectedOption,
                'is_correct' => $isCorrect,
                'test_nom' => $latestTestNo,
                //here i will write the latest test_no in table test_number
               
                // Add other fields as needed
            ]);
            $answer->save();


    
            // Perform any additional processing or validation as needed
    
            // Example: Store the answer in the database
            // You may need to adjust this based on your database schema
            // Here, I assume you have an Answer model
            // Ensure you have the necessary use statement at the top: use App\Models\Answer;
           return response()->json(['message' => 'Answer stored successfully', 'answer' => $answer]);
    
            // Respond with a success message or any other response
          
        }

        
    

       
        public function sendMessagesToAdmin()
        {
            // Get the user ID from the session
            $userId = Session::get('loginId');
            $maxTestNo = Test_number::where('userr_id', $userId)->max('test_no');
        
            // Get the user's correct answer count
            $correctAnswersCount = Answer::where('user_id', $userId)
                ->where('test_nom', $maxTestNo)
                ->where('is_correct', '1')
                ->count();
       

             $totalAnswer = Answer::where('user_id', $userId) //own
            ->where('test_nom', $maxTestNo)
             ->count();


            // Retrieve the user name from the 'users' table
            $user = User::find($userId);
            
            if ($user) {
                $userName = $user->name; // Assuming the user model has a 'name' attribute
        
                // Send a message to the admin
                $message = "User $userName has $correctAnswersCount correct answers out of $totalAnswer attempted questions";//own
        
                // You can store this message in the database, send an email, or use any other notification method.
                // For simplicity, let's assume you are storing the message in the database.
                \DB::table('admin_messages')->insert(['user_id' => $userId, 'message' => $message]);
        
                return "Message sent to admin successfully.";
            } else {
                return "User not found.";
            }

            
        }

        public function someLogoutFunction()
    {
        // Additional actions before logout
        $this->performLogoutActions();

        // Log the user out
        // if(session()->has('loginId'))session()->pull('loginId',null);
       // return response()->json(['message' => 'Logout successful']);
        // Redirect the user to a different page, like the login page
        return redirect('/login');
    }

    private function performLogoutActions()
    {

        $id = Session::get('loginId');
        $user = User::find($id);
       
        // Additional actions before logout, e.g., sending an email
        
        // You can access request data, session, or anything else needed here
        if ($user) {
            $email = $user->email;
            
           
            // Fetch the message using Eloquent
            $result = Admin_message::where('user_id', $user->id)
            ->orderBy('a_id', 'desc') // Order by id in descending order
             ->first();
           //dd($result);
            if ($result) {
                $message = $result->message;
                
                // dd($message);
                // Send an email to the user
                $this->sendEmail($user, $result);
            }
        }
    
    }
    private function sendEmail($user, $result)
    {
        // Use Laravel's Mail facade to send an email
        Mail::to($user->email)->send(new sendresult($result));

          if(session()->has('loginId'))session()->pull('loginId',null);
         
    }
}

        

    

    
    

   


