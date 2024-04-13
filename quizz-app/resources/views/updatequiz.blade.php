<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .card{
            margin-top:50px;
        }

        .sb{
            margin-top:15px;
        }
        .done-button-container {
    float: right;
}
    </style>
</head>
<body>
@foreach($collection as $item)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Question</div>

                    <div class="card-body">
                        <!-- Your form content goes here -->
                        <form method="post" action="{{ url('/update/' . $id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="question">Question:</label>
                                <textarea class="form-control" id="question" name="question" rows="3" >{{$item['question']}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="option1">Option 1:</label>
                                <input type="text" class="form-control" id="option1" name="option1"  value="{{$item['option1']}}">
                            </div>

                            <div class="form-group">
                                <label for="option2">Option 2:</label>
                                <input type="text" class="form-control" id="option2" name="option2"  value="{{$item['option2']}}">
                            </div>

                            <div class="form-group">
                                <label for="option3">Option 3:</label>
                                <input type="text" class="form-control" id="option3" name="option3"  value="{{$item['option3']}}">
                            </div>

                            <div class="form-group">
                                <label for="option4">Option 4:</label>
                                <input type="text" class="form-control" id="option4" name="option4"  value="{{$item['option4']}}">
                            </div>

                            <div class="form-group">
                                <label for="correct_option">Correct Option:</label>
                                <select class="form-control" id="correct_option" name="correct_option" >
                                    <option value="option1" {{ $item['correct_option'] === 'option1' ? 'selected' : '' }}>Option 1</option>
                                    <option value="option2" {{ $item['correct_option'] === 'option2' ? 'selected' : '' }}>Option 2</option>
                                    <option value="option3" {{ $item['correct_option'] === 'option3' ? 'selected' : '' }}>Option 3</option>
                                    <option value="option4" {{ $item['correct_option'] === 'option4' ? 'selected' : '' }}>Option 4</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="time_alloted">Time Allotted (in seconds):</label>
                                <input type="number" class="form-control" id="time_alloted" name="time_alloted"  value="{{$item['time_alloted']}}">
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary sb">Submit</button>
                            <div class="done-button-container">
        <a href="/taskmanage" class="btn btn-primary btn-block">Done</a>
        
    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
