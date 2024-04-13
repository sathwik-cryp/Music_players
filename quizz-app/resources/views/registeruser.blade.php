<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .kab {
            margin: 80px;
        }

        .done-button-container {
            float: left;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="done-button-container">
            <a href="/taskmanage" class="btn btn-primary"><i class="fa-solid fa-left-long"></i></a>
        </div>

<form method="post" action="/userdash">
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
    <div class="kab">
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}" >
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name')}}" >
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
        </div>

        <div class="form-group">
            <label for="task_id" class="form-label">Task ID</label>
            <select class="form-select" id="task_id" name="task_id" >
                @foreach ($collection as $item)
                    <option value="{{ $item['task_num'] }}">{{ $item['task_num'] }}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('task_id') {{$message}} @enderror</span>
        </div>

        <button type="submit" class="btn btn-primary">Create user</button>
       
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
