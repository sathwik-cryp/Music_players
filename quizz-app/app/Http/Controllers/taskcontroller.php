<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Question;
use App\Models\Admin_message;
use App\Models\Task_number;
use App\Models\Task;

class taskcontroller extends Controller
{
    //

    public function taskview(Request $req){
        $data = Question::orderBy('id', 'desc')->get();//->paginate(3);

        return view("adminresultdash",['collection'=>$data]);
    }

    public function createWithQuestions(array $data)
    {
        // Ensure you have the correct models and relationships set up

        // Create a new Task instance
        $task = Task::create([
            'test_num_id' => $data['task_num'],
        ]);

        // Attach the selected questions to the task
        $task->questions()->attach($data['question_ids']);

        // Optionally, you might want to return the created task or perform additional actions

        return $task;
    }


    public function addToTask(Request $request)
    {
        // Retrieve selected question IDs from the request
        $selectedQuestionIds = $request->input('selected_questions');
        // dd($selectedQuestionIds);

        $adminId = session('adminId');
        $taskNum = Task_number::create([
            'admin_id' => $adminId,
        ]);
        $selectedQuestionIds = $request->input('selected_questions');

        // Retrieve the details of selected questions from the question table
        $selectedQuestions = Question::whereIn('id', $selectedQuestionIds)->get();
    
        // Create new records in the task table based on selected questions
        foreach ($selectedQuestions as $selectedQuestion) {
            Task::create([
                'question_id'=> $selectedQuestion->id,
                'question' => $selectedQuestion->question,
                'option1' => $selectedQuestion->option1,
                'option2' => $selectedQuestion->option2,
                'option3' => $selectedQuestion->option3,
                'option4' => $selectedQuestion->option4,
                'correct_option' => $selectedQuestion->correct_option,
                'task_num' => $taskNum->id,
                'time_alloted' => $selectedQuestion->time_alloted,
                // Add other columns as needed
            ]);
        }
    

       

      

        return redirect('/taskmanage')->with('success', 'Questions added to the task successfully.');
    }

    public function showTasks()
{
    $tasks = Task::orderBy('task_num')->get()->groupBy('task_num');
    
    return view('showtasklist',['collection' => $tasks]);
}

public function deletetask(Request $request, $id)
{
    Task::where('task_num', $id)->delete();

    if ($request->ajax()) {
        return response()->json(['code' => 200, 'message' => 'Task deleted successfully.']);
    }

    return redirect()->back()->with('success', 'Task deleted successfully.');
}
}
