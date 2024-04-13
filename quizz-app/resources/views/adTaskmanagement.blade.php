
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>



.task-list {
    list-style: none;
}

.task {
    cursor: pointer; /* Indicate interactivity */
}

.dropdown-menu {
    display: none; /* Hide by default */
    position: absolute;
    background-color: #f0f0f0;
    padding: 10px;
    border: 1px solid #ccc;
    z-index: 1; /* Ensure it appears above other elements */
}

.task:hover .dropdown-menu {
    display: block; /* Show on hover */
}

.dropdown-toggle::after {
        content: none; /* This hides the dropdown arrow */
    }

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
          
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand,
        .nav-link {
            color: #212529;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        .container {
            text-align: center;
            margin-top: 20px;
            
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* LeetCode-style content box */
        .content-box {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 44px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <b class="navbar-brand" >Task Management</b>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto task-list">
                    <li class="nav-item task">
                    <div class="dropdown">
                <b class="nav-link active dropdown-toggle"  role="button" id="taskDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Forms To Enter
    </b>
                <ul class="dropdown-menu" aria-labelledby="taskDropdown">
                    <li><a class="dropdown-item" href="/quiz">Add Question</a></li>
                    <li><a class="dropdown-item" href="/adtask">Add Task</a></li>
                    <li><a class="dropdown-item" href="/userdash">User Register</a></li>
                    <!-- Add more dropdown items as needed -->
                </ul>
            </div>
            <li class="nav-item task">
                    <div class="dropdown">
                <b class="nav-link active dropdown-toggle"  role="button" id="taskDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    View lists
    </b>
                <ul class="dropdown-menu" aria-labelledby="taskDropdown">
                    <li><a class="dropdown-item" href="/admindash">Quizz List</a></li>
                    <li><a class="dropdown-item" href="/taskview">Task List</a></li>
                    <li><a class="dropdown-item" href="/userlist">User List</a></li>
                    <li><a class="dropdown-item" href="/adminresultview">User Result</a></li>
                    <!-- Add more dropdown items as needed -->
                </ul>
            
                    
                </ul>
                <div class="navbar-nav">
                    <a href="/adminlogout" class="nav-link">
                        <button class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
       
    <div class="content-box">
            <h1>Add Question</h1>
            <p>Here we can create the number of questions we want </p>
            <p>The quetion will be knowledgeable</p>
            <p>The put how many questions he wants</p>
            <!-- Add your content -->
            <a href="/quiz" class="btn btn-primary btn-block">Add Quizz</a>
        </div>

        <div class="content-box">
            <h1>Add Task</h1>
            <p>User can write whatever questions you select</p>
            <p>Questions what the admins selects</p>
            <p>The selected will questins will have task which will be given to user</p>
            <!-- Add your content -->
            <a href="/adtask" class="btn btn-primary btn-block">add task</a>
        </div>

        <div class="content-box">
            <h1>User Registration</h1>
            <p>User can be registered here</p>
            <p>User email should be unique</p>
            <p>Name of the user registered will be called while giving result</p>
            <!-- Add your content -->
            <a href="/userdash" class="btn btn-primary btn-block">User Registration</a>
        </div>

        
        <div class="content-box">
            <h1>Task View</h1>
           <p>Here you view how many tasks you have</p>
           <p>You can also know which task id has how many questions</p>
           <p>You can also delete the task</p>
            <!-- Add your content -->
            <a href="/taskview" class="btn btn-primary btn-block">Task List</a>
        </div>

        <div class="content-box">
            <h1>User List </h1>
           <p>Here you can find the list of user</p>
           <p>And can also find their task id</p>
           <p>Here user list if you want to change the task id you have to delete and create new user</p>
            <!-- Add your content -->
            <a href="/userlist" class="btn btn-primary btn-block">User List</a>
        </div>
       

        <div class="content-box">
            <h1>Quizz List</h1>
            <p>Here you find what are the question asked for the user </p>
            <p>Know how many questions are created by admin</p>
            <p>Admin can also update and also delete the question as he wants</p>
            <!-- Add your content -->
            <a href="/admindash" class="btn btn-primary btn-block">Quizz List</a>
        </div>

        

        <div class="content-box">
            <h1>User Result</h1>
            <p>User result helps you to know what the user result is</p>
            <p>Here along with result the user can also see how many question attempted</p>
            <p>When the user logsout the user will have mail of his result</p>
            <!-- Add your content -->
            <a href="/adminresultview" class="btn btn-primary btn-block">User Test Result</a>
        </div>

        <div class="content-box">
            <h1>Instructions</h1>
            <p>While quizz is going on user cannot have click on any other button </p>
            <p>Any <b>Malpractice</b> will not be accepted</p>
            <p>The user will be blacklisted if he is found cheating</p>
            <!-- Add your content -->
        </div>

        <div class="content-box">
            <h1>Description</h1>
            <p>The test have four option </p>
            <p>The admin can decide how many questions in each task should be</P>
            <p>The user will get password through mail and also result is sent through mail </p>

            <!-- Add your content -->
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>