<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .card {
            margin-top: 50px;
        }

        .sb {
            margin-top: 15px;
        }
        .done-button-container {
    float: left;
    margin-top:50px;
    padding-right: 10px;
}
    </style>
</head>
<body>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="done-button-container">
        <a href="/taskmanage" class="btn btn-primary btn-block"><i class="fa-solid fa-left-long"></i></a>
    </div>
            <div class="card">
                <div class="card-header">Add Question</div>

                <div class="card-body">
                   
                    <!-- Your form content goes here -->
                    <form method="post" action="{{ url('/quiz') }}">
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
                            <label for="question">Question:</label>
                            <textarea class="form-control" id="question" name="question" rows="3" >{{old('question')}}</textarea>
                            <span class="text-danger">@error('question') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="option1">Option 1:</label>
                            <input type="text" class="form-control" id="option1" name="option1" value="{{old('option1')}}">
                            <span class="text-danger">@error('option1') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="option2">Option 2:</label>
                            <input type="text" class="form-control" id="option2" name="option2" value="{{old('option2')}}">
                            <span class="text-danger">@error('option2') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="option3">Option 3:</label>
                            <input type="text" class="form-control" id="option3" name="option3" value="{{old('option3')}}">
                            <span class="text-danger">@error('option3') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="option4">Option 4:</label>
                            <input type="text" class="form-control" id="option4" name="option4" value="{{old('option4')}}">
                            <span class="text-danger">@error('option4') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="correct_option">Correct Option:</label>
                            <select class="form-control" id="correct_option" name="correct_option">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                            </select>
                            <span class="text-danger">@error('correct_option') {{$message}} @enderror </span>
                        </div>

                        <div class="form-group">
                            <label for="time_alloted">Time Allotted (in seconds):</label>
                            <input type="number" class="form-control" id="time_alloted" name="time_alloted" value="{{old('time_alloted')}}" >
                            <span class="text-danger">@error('time_alloted') {{$message}} @enderror </span>
                        </div>

                        <button type="submit" class="btn btn-primary sb">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
