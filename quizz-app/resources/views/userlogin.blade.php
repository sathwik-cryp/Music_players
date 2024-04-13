<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      
        body {
      background-color: #f8f9fa; /* Light gray background color */
      display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
    }

    .container {
   
    margin: auto; /* Center horizontally */
    background-color: #ffffff; /* White container background */
    padding: 20px;
    border-radius: 82px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
    margin: 0px; /* Add some top margin for better spacing */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }

    h4 {
      color: #007bff; /* Blue color for heading */
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px; /* Add spacing between form groups */
    }

    label {
      font-weight: bold;
      color: #343a40; /* Dark gray color for labels */
    }

    input.form-control {
      border: 1px solid #ced4da; /* Light gray border for input fields */
    }

    .btn-primary {
      background-color: #007bff; /* Blue color for the primary button */
      border: 1px solid #007bff; /* Matching border color */
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Darker blue color on hover */
      border: 1px solid #0056b3; /* Matching border color on hover */
    }

    a {
      color: #ffffff; /* White color for links */
      text-decoration: none;
    }

    .btn-as-admin {
      background-color: #007bff; /* Blue color for the admin button */
      border: 1px solid #007bff; /* Matching border color */
    }

    .btn-as-admin:hover {
      background-color: #0056b3; /* Darker blue color on hover */
      border: 1px solid #0056b3; /* Matching border color on hover */
    }

    .btn1{
      margin: 0px;
      

    }
        
      
    </style>
  </head>
  <body>
      <div class="container" style="max-width:400px;">
        <div class="row" style="margin:auto;">
            <div class="col-md-12 col-md-offset-1" style="margin-top:20px;">
                <h4 style="color:blue;">User Log In</h4>
               <br>
                <form action="/login" method="post">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password') {{$message}} @enderror </span>
                    </div>
                    <br>
                    <div class="form-group">
                       <button class="btn btn-block btn-primary" type="submit">Log In</button>
                    </div>
                    <br>
                   
                   </form>
                  
                <div class="form-group">
                       <a href="/admin"><button class="btn1 btn btn-block btn-primary">Log In as admin</button> </a>
                </div>
                
                
               
            </div>
        </div>
      </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>