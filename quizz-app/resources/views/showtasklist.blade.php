<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       .btn1{
        margin-right: 1300px;
       }
    </style>
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="my-4">Task List</h1>
        <div class="done-button-container">
        <a href="/taskmanage" class="btn btn1 btn-primary btn-block"><i class="fa-solid fa-left-long"></i></a>
    </div>  
        @foreach ($collection as $taskNum => $taskGroup)
            <div class="mb-4" data-task-num="{{ $taskNum }}">
                <h3>Task {{ $taskNum }}</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Question ID</th>
                                <th>Question</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Correct Option</th>
                                <th>Time Allotted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taskGroup as $task)
                                <tr>
                                    <td>{{ $task->question_id }}</td>
                                    <td>{{ $task->question }}</td>
                                    <td>{{ $task->option1 }}</td>
                                    <td>{{ $task->option2 }}</td>
                                    <td>{{ $task->option3 }}</td>
                                    <td>{{ $task->option4 }}</td>
                                    <td>{{ $task->correct_option }}</td>
                                    <td>{{ $task->time_alloted }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-danger" onclick="deleteTask({{ $taskNum }})"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function deleteTask(taskNum) {
            if (confirm('Are you sure you want to delete Task ' + taskNum + '?')) {
                $.ajax({
                    url: '/dele/' + taskNum,
                    method: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);

                        if (response.code == 200) {
                            // Remove the parent .mb-4 div
                            $('[data-task-num="' + taskNum + '"]').closest(".mb-4").remove();
                        }
                    },
                    error: function (error) {
                        console.log("Error:", error);
                    }
                });
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
