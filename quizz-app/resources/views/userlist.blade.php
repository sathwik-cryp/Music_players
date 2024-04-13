<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
   
    <div class="container mt-5 text-center">
        <h1 class="my-4">User List</h1>
       
            
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>user email</th>
                                <th>Name</th>
                                <th>Task id</th> 
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $task)
                                <tr data-row-id="{{ $task->id }}">
                                    
                                    <td>{{ $task->name}}</td>
                                    <td>{{ $task->email}}</td>
                                    <td>{{ $task->task_id}}</td>
                                    <td><button class="btn btn-danger del">Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="done-button-container">
        <a href="/taskmanage" class="btn btn-primary btn-block"><i class="fa-solid fa-left-long"></i></a>
    </div>  
                    
                </div>
            </div>
     
    </div>
    <script>
        $(document).ready(function() {
            $('.del').click(function() {
               
                 $button = $(this);
                 console.log($button);
               
                var rowId = $button.closest("tr").data("row-id");
                 console.log(rowId);

               
                jQuery.ajax({
                    url: '/delu/'+rowId, 
                    method: "GET",
                    
                    
                    success: function(response) {
                     console.log(response);
                        
                        if (response.code == 200) {
                            
                            $button.closest("tr").remove();
                        }
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            });
            
        });

        </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>