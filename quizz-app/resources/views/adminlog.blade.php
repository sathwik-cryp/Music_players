<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      /* Default styles for light mode */
      body {
        background-color: #ffffff;
        color: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      /* Dark mode styles */
      body.dark-mode {
        background-color: #1a1a1a;
        color: #ffffff;
      }

      .dark-mode-button{
        margin-left:140px;
      }

      
      body {
      background-color: #f8f9fa; /* Light gray background color */
    }

    .lg{
      margin-left:2px;
    }

    .container {
      margin: auto; /* Center horizontally */
    background-color: #ffffff; /* White container background */
    padding: 20px;
    border-radius: 74px; /* Rounded corners */
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
        

      
    </style>
  </head>
  <body>
    

    <div class="container" style="max-width:400px;">
      <div class="row">
        <div class="col-md-12" style="margin-top:20px;">
          <h4 style="color:blue; text-align: center;">Log In For Admins</h4>
          <br>
          <form action="/admin" method="post">
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
              <label for="email"><b>Username</b></label>
              <input type="text" class="form-control" placeholder="Enter username" name="username" value="{{old('username')}}">
              <span class="text-danger">@error('username') {{$message}} @enderror </span>
            </div>
            <div class="form-group">
              <label for="password"><b>Password</b></label>
              <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{old('password')}}">
              <span class="text-danger">@error('password') {{$message}} @enderror </span>
            </div><br>
            <div class="form-group">
              <button class="btn btn-block btn-primary" type="submit">Log In</button>
             
            </div>
            <div class="form-group">
            <button id="darkModeToggle" class="btn btn-block btn-secondary dark-mode-button lg">Toggle Dark Mode</button>
            </div>
            <br>

          </form>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function () {
        // Check if user preference is set, or use a default value
        const isDarkModeEnabled = localStorage.getItem('darkMode') === 'enabled';

        // Set initial dark mode state
        if (isDarkModeEnabled) {
          $('body').addClass('dark-mode');
        }

        // Toggle dark mode on button click
        $('#darkModeToggle').on('click', function () {
          $('body').toggleClass('dark-mode');

          // Save user preference in localStorage
          if ($('body').hasClass('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
          } else {
            localStorage.setItem('darkMode', 'disabled');
          }
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
