<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Session;

class Quizcontroller extends Controller
{
    public function create()
    {
        return view('quiz');
    }

    public function store(Request $req)
    {
         $req->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required|in:option1,option2,option3,option4',
            'time_alloted' => 'required|numeric',
        ]);

       $qz= new Question;
       $qz->question=$req->question;
       $qz->option1=$req->option1;
       $qz->option2=$req->option2;
       $qz->option3=$req->option3;
       $qz->option4=$req->option4;
       $qz->correct_option=$req->correct_option;
       $qz->time_alloted=$req->time_alloted;

        if($qz->save()){
        return redirect('/quiz')->with('success', 'Question added successfully!');
        }

        else{
             return back()->with('fail','Something went wrong');
        }
    }

    public function delete($id){
       
        $res=Question::where('id',$id)->delete();
        if ($res=== 1) {
            return response()->json(['status'=>'success','code'=> 200, 'message'=>'Song deleted successfully.']);
        } else {
            return response()->json(['status'=>'error','code'=> 500, 'message'=>'Failed to delete advertisement']);
        }
    }


    public function updateview($id){
       
        
            $data = Question::where('id', $id)->get();
            return view('updatequiz', ['collection' => $data, 'id' => $id]);
        
            } 
        
    

    public function update(Request $req, $id){
        $req->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required|in:option1,option2,option3,option4',
            'time_alloted' => 'required|numeric',
         ]);
        $data=Question::find($id);
        if($data){
            $data->question=$req->question;
            $data->option1=$req->option1;
            $data->option2=$req->option2;
            $data->option3=$req->option3;
            $data->option4=$req->option4;
            $data->correct_option=$req->correct_option;
            $data->time_alloted=$req->time_alloted;

            $data->save();
            return redirect("admindash");

        }


    }

    // public function addToTask(Request $req)
    // {
    //     $selectedQuestionIds = $req->input('selected_questions');

    //     // Validate selectedQuestionIds if needed

    //     // Save selected questions to the Task table
    //     Task::create(['question_ids' => $selectedQuestionIds]);

    //     return redirect()->route('questions.index')->with('success', 'Questions added to the task successfully.');
    // }
}

