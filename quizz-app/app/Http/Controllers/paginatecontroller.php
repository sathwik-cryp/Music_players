<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Task;
use Session;
use App\Models\User;
use App\Models\Answer;


class paginatecontroller extends Controller
{
    //
    public function getPaginatedData(Request $request)
{
//     $itemsPerPage = 1;

// // Count the total number of items
// $totalItems = Question::count();

// // Calculate the total number of pages based on the items per page
// $totalPages = ceil($totalItems / $itemsPerPage);

// // Get the current page from the request or default to 1
// $page = $request->input('page', 1);

// // Ensure that the page is within valid bounds
// $page = max(1, min($page, $totalPages));

// // Fetch the paginated data based on the calculated items per page
// $data = Question::paginate($itemsPerPage, ['*'], 'page', $page);

// // Pass the total pages to the view if needed
// return view('home', ['collection' => $data, 'totalPages' => $totalPages]);

$itemsPerPage = $request->input('itemsPerPage', 1); // Get items per page from the request or default to 10

        // Count the total number of items
        // $totalItems = Question::count();
        $id = Session::get('loginId');
    
        // Fetch user using the ID
        $user = User::find($id);
        $taskId = $user->task_id;
        $totalItems = Task::where('task_num', $taskId)
                        ->groupBy('task_num')
                        ->count();
        // dd($totalItems);

        // Calculate the total number of pages based on the items per page
        $totalPages = ceil($totalItems / $itemsPerPage);
        // dd($totalPages);

        // Get the current page from the request or default to 1
        // dd($request->all());
        $page = $request->input('page', 1);
        // dd($page);

        // Ensure that the page is within valid bounds
        $page = max(1, min($page, $totalPages));
        // dd($page);

        // Fetch the paginated data using Laravel's built-in paginate method
        //$data = Task::paginate($itemsPerPage, ['*'], 'page', $page);
        $data = Task::where('task_num', $taskId)
    ->paginate($itemsPerPage, ['*'], 'page', $page);
        //dd($data);

        // Pass the total pages and items per page to the view if needed
        // dd($totalPages);
        $response = response()->view('home', [
            'collection' => $data,
            'totalPages' => $totalPages,
            'itemsPerPage' => $itemsPerPage,
        ]);

        // Set the 'X-Total-Pages' header in the response
        $response->header('X-Total-Pages', $totalPages);

        return $response;
}
}
