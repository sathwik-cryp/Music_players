<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
        margin: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        border: 20px solid black;
        overflow: hidden;
      }

      .text-center{
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 1);
        padding: 44px;
        border-radius: 60px;
      }

      h1, h2 {
        color: #007bff;
      }
      .name {
            font-size: 28px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .task {
            font-size: 20px;
            color: black;
        }


      p {
        font-size: 16px;
      }

      .btn-primary {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        border: none;
      }

      .btn-primary:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <div class="text-center">
      <h1 class="name">Welcome,<i>{{$userName}}</i></h1>
      <h2 class="task">Task ID:{{$taskId}}</h1>
      <h1>Test Instructions</h1>
      <p>user should not click any web page button</p>
      <p>Do not copy in the exam</p>
      <p>Answer or at least try to</p>
      <p>Usage of the internet is strictly prohibited</p>
      <br>
      <br>
      <h2>When you click on the button below, the timer will start based on the allotted question time</h2>
      <button class="btn btn-success" onclick="startTest()">Start Test</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
//   window.addEventListener('beforeunload', function (event) {
//     // Perform actions when the user navigates away (e.g., pressing back button)
//     // This could include logging the user out or making an AJAX call to invalidate the session
//     console.log('Before unload event triggered');
//     // Perform logout or other actions here
// });

    function startTest() {
        // Use JavaScript to handle navigation
        window.location.href = '/home';
    }


//     $(document).ready(function() {
//     // Disable back button and clear session on popstate event
//     history.pushState({}, '', '/userinstruct');

    
//     $(window).on('popstate', function() {
//         console.log('popstate event triggered');
//         // Make an AJAX request to clear the session
//         $.ajax({
//             url: '/clear-session', // Replace with your actual route
//             method: 'POST',
            
//             data:{
//               _token: '{{ csrf_token()}}'}, // Replace with your actual session key
//             success: function(response) {
//                 console.log('Session cleared successfully');
//             },
//             error: function(xhr, status, error) {
//                 console.error('Error clearing session:', error);
//             }
//         });
//     });

  
// });

</script>
  
  </body>
</html>
