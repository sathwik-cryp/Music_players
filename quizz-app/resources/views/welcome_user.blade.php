<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
            margin-top: 15px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <p style="font-size: 1.5em;">Hello {{ $user->name }},</p>

            <p>Welcome to our application! Your account has been created with the following details:</p>

            <p><b>Email</b>: {{ $user->email }}</p>
            <p><b> Password </b>: {{ $password }}</p>

            <a href="http://127.0.0.1:8000/login" class="btn-primary">Click here to log in</a>

            <p style="margin-top: 15px;">Thank you!</p>
        </div>
    </div>

</body>
</html>
