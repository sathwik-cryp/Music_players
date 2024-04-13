<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam Ended</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        border: 50px solid black;
        overflow: hidden;
        }

        .container {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 50px;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }



        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Exam Ended</h1>
        <button type="button" id="logoutButton" class="btn btn-primary">Logout</button>
    </div>

    <script>


        $(document).ready(function () {
            // Trigger the POST request when the document is ready
            $.ajax({
                type: 'POST',
                url: '/next-page',
                data: {
                    // Add any data you want to send in the request payload
                    // For example:
                    // key1: 'value1',
                    // key2: 'value2',
                    _token: '{{ csrf_token()}}'
                },
                success: function (response) {
                    console.log('POST request successful:', response);
                },
                error: function (error) {
                    console.error('Error in POST request:', error);
                }
            });
        });

        $(document).ready(function () {
            // When the button is clicked
            $("#logoutButton").click(function () {
                // Redirect to the login route
                window.location.href = '/logout';
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
