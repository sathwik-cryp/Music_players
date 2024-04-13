<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e0e1dd;
            
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            margin-top: 220px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }
/* 
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        } */

        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #timer {
            text-align: center;
            font-size: 24px;
            margin-top: 15px;
        }

        p {
            margin-top: 10px;
        }

        /* div.options {
            margin-top: 10px;
        }

        .options div {
            margin-bottom: 10px;
        } */

        .options div {
    display: flex;
    align-items: center;
    margin-bottom: 10px; /* Adjust the margin as needed */
}

.options label {
    margin-left: 50px; /* Adjust the margin as needed */
}

        .pagination-container {
       align
        margin-top: 20px; /* Adjust the margin-top as needed */
    }

  

    .pagination a {
        color: #007bff;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color 0.3s;
        border: 1px solid #007bff;
        margin: 0 4px;
        border-radius: 5px;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #f0f0f0;
    }
    input[type="number"] {
        width: 46px;
    border: none;
    outline: none;
    background-color: transparent;
   
    /* -webkit-appearance: none; /* Remove default styling in Safari */
    /* -moz-appearance: textfield; Remove default styling in Firefox */
} 
.inp{
    text-align:center;
}
    
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body  class="paginatedDataContainer">


<!-- <form >
@csrf
    <h1>All Questions</h1>

    @foreach ($collection as $question)
    
        <div>
            <label for="seconds">Enter seconds:</label>
            <input type="number" id="seconds" min="1" value="{{$question->time_alloted}}">
            <button type="button" onclick="startCountdown()">Start Countdown</button>
        </div>
        <div id="timer">00:00</div>

        <p>{{ $question->question }}</p>

        <div class="options">
            <div>
                <input type="radio" id="option1" name="user_answers[{{ $question->id }}]" value="{{ $question->option1 }}">
                <label>{{ $question->option1 }}</label>
            </div>
            <div>
                <input type="radio" id="option2" name="user_answers[{{ $question->id }}]" value="{{ $question->option2 }}">
                <label>{{ $question->option2 }}</label>
            </div>
            <div>
                <input type="radio" id="option3" name="user_answers[{{ $question->id }}]" value="{{ $question->option3 }}">
                <label>{{ $question->option3 }}</label>
            </div>
            <div>
                <input type="radio" id="option4" name="user_answers[{{ $question->id }}]" value="{{ $question->option4 }}">
                <label>{{ $question->option4 }}</label>
            </div>
        </div>
        <button type="button" id="storeAndLoadNextPage"  onclick="submitAnswer({{ $question->id }})">Submit Answers</button>
    @endforeach

   
</form>
<div class="paginatedDataContainer" style="display:inline-block; margin:auto;">
           
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    function getCSRFToken() {
    return $('meta[name="csrf-token"]').attr('content');
}

    function startCountdown() {
        // Your existing countdown code
        var secondsInput = document.getElementById('seconds');
        var timerDisplay = document.getElementById('timer');
        var seconds = parseInt(secondsInput.value, 10);

        function updateTimer() {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = seconds % 60;

            var formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
            var formattedSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;

            timerDisplay.textContent = formattedMinutes + ':' + formattedSeconds;

            if (--seconds < 0) {
                clearInterval(intervalId);
                alert('Time up!');
            }
        }

        updateTimer(); // Initial update

        var intervalId = setInterval(updateTimer, 1000);
    }

    // Trigger the countdown when the page loads
    document.addEventListener('DOMContentLoaded', startCountdown);



    

// Include CSRF token in the AJAX request headers

// function submitAnswer(questionId) {
//     // Get the selected radio button value
//     var selectedAnswerValue = $('input[name^="user_answers"]:checked').val();

//     // Find the radio button with the matching value
//     var selectedRadioButton = $('input[name^="user_answers"][value="' + selectedAnswerValue + '"]');
//     console.log( selectedRadioButton);
//     // Ensure a matching radio button is found
//     if (selectedRadioButton.length > 0) {
//         // Extract the option number from the id attribute of the selected radio button
//         var optionNumber = selectedRadioButton.attr('id').replace('#', '');

//         console.log(optionNumber);
//         storeData(questionId, optionNumber);
//     } else {
//         // Handle the case where no matching radio button is found
//         console.log('Error: Could not find matching radio button for the selected answer value.');
//     }
// }

function submitAnswer(questionId) {
    // Get the selected radio button value
    var selectedAnswerValue = $('input[name^="user_answers"]:checked').val();

    // Find the radio button with the matching value
    var selectedRadioButton = $('input[name^="user_answers"][value="' + selectedAnswerValue + '"]');
    
    // Ensure a matching radio button is found
    if (selectedRadioButton.length > 0) {
        // Extract the option number from the id attribute of the selected radio button
        var optionNumber = selectedRadioButton.attr('id').replace('option', '');

        // Store the current answer
        storeData(questionId, optionNumber);

        // After storing the answer, load the next page
       
    } else {
        // Handle the case where no matching radio button is found
        console.log('Error: Could not find matching radio button for the selected answer value.');
    }
}


function storeData(questionId, optionNumber ) {
    // Your logic for storing data, for example, submitting a form via AJAX
    var csrfToken = getCSRFToken();
    console.log('CSRF Token:', getCSRFToken());
    console.log('CSRF Token:', getCSRFToken());
    
    console.log(questionId);
    
    $.ajax({
        type: 'POST',
        url: '/home',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            question_id: questionId,
            selected_option:  optionNumber,
          
            // Add other data as needed
        },
        success: function (response) {
            console.log('Data stored successfully:', response);
            loadNextPage();
        },
        error: function (error) {
            console.error('Error storing data:', error);
        }
    });
}



// function loadNextPage() {
//     // Make an AJAX request to fetch the next page of data
//     $.ajax({
//         type: 'GET',
//         url: '/get-paginated-data?page=' + nextPage,
//         success: function (data) {
//             // Append the new data to the container
//             $('#paginatedDataContainer').append(data);

//             // Increment the page number for the next request
//             nextPage++;
            
//             // Optionally, you can check if there are more pages to load
//             // and hide the "Load More" button when there are no more pages
//             // if (nextPage > totalPageCount) {
//             //     $('#loadMoreButton').hide();
//             // }
//         },
//         error: function (error) {
//             console.error('Error fetching next page:', error);
//         }
//     });
// }
function loadNextPage() {
    // Make an AJAX request to fetch the next page of data
    $.ajax({
        type: 'GET',
        url: '/get-paginated-data?page=' + nextPage,
        success: function (data) {
            // Append the new data to the container
            $('#paginatedDataContainer').html(data);

            // Increment the page number for the next request
            nextPage++;
        },
        error: function (error) {
            console.error('Error fetching next page:', error);
        }
    });
}



// $('#storeAndLoadNextPage').click(function () {
//     // First, store the data
//    // storeData();

//     // Then, load the next page
//     loadNextPage();
// });
</script> -->



<form >
    @csrf
    <h1>All Questions</h1>

    @foreach ($collection as $question)
 <div>
       <div class="inp">
         
            <input type="number" id="seconds" min="1" value="{{ $question->time_alloted }}">
            <span  onclick="startCountdown()">seconds time alloted</span>
        </div>
        <div id="timer">00:00</div>

        <p>{{ $question->question }}</p>

        <div class="options ">
            <div>
                <input type="radio" id="option1" name="user_answers[{{ $question->question_id }}]" value="{{ $question->option1 }}">
                <label>{{ $question->option1 }}</label>
            </div>
            <div>
                <input type="radio" id="option2" name="user_answers[{{ $question->question_id }}]" value="{{ $question->option2 }}">
                <label>{{ $question->option2 }}</label>
            </div>
            <div>
                <input type="radio" id="option3" name="user_answers[{{ $question->question_id }}]" value="{{ $question->option3 }}">
                <label>{{ $question->option3 }}</label>
            </div>
            <div>
                <input type="radio" id="option4" name="user_answers[{{ $question->question_id }}]" value="{{ $question->option4 }}">
                <label>{{ $question->option4 }}</label>
            </div>
        </div>
        <br>
        <button type="button" onclick="submitAnswer({{ $question->question_id }})">Submit Answer</button>
       </div>
    @endforeach
    <!-- {{ $collection->links() }} -->
</form>
<div  style="display:inline-block; margin:auto;">


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    //

    
    



    function getCSRFToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    function startCountdown() {
        // Your existing countdown code
        var secondsInput = document.getElementById('seconds');
        var timerDisplay = document.getElementById('timer');
        var seconds = parseInt(secondsInput.value, 10);

        function updateTimer() {
            var minutes = Math.floor(seconds / 60);
            var remainingSeconds = seconds % 60;

            var formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
            var formattedSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;

            timerDisplay.textContent = formattedMinutes + ':' + formattedSeconds;

            if (--seconds < 0) {
                clearInterval(intervalId);
                loadNextPage();
            }
        }

        updateTimer(); // Initial update

        var intervalId = setInterval(updateTimer, 1000);
    }

    // Trigger the countdown when the page loads
    document.addEventListener('DOMContentLoaded', startCountdown);
    

    function submitAnswer(questionId) {
        // Get the selected radio button value
        var selectedAnswerValue = $('input[name^="user_answers"]:checked').val();

        // Find the radio button with the matching value
        var selectedRadioButton = $('input[name^="user_answers"][value="' + selectedAnswerValue + '"]');

        // Ensure a matching radio button is found
        if (selectedRadioButton.length > 0) {
            // Extract the option number from the id attribute of the selected radio button
            var optionNumber = selectedRadioButton.attr('id').replace('#', '');

            // Store the current answer
            storeData(questionId, optionNumber);

            // After storing the answer, load the next page
            loadNextPage();
        } else {
            // Handle the case where no matching radio button is found
            console.log('Error: Could not find matching radio button for the selected answer value.');
        }
    }

    function storeData(questionId, optionNumber) {
        // Your logic for storing data, for example, submitting a form via AJAX
        var csrfToken = getCSRFToken();
        console.log('CSRF Token:', getCSRFToken());
        console.log('CSRF Token:', getCSRFToken());

        console.log(questionId);

        $.ajax({
            type: 'POST',
            url: '/home',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                question_id: questionId,
                selected_option: optionNumber,

                // Add other data as needed
            },
            success: function (response) {
                console.log('Data stored successfully:', response);
            },
            error: function (error) {
                console.error('Error storing data:', error);
            }
        });
    }

    //

    // function loadNextPage() {
    //     // Make an AJAX request to fetch the next page of data
    //     $.ajax({
    //         type: 'GET',
    //         url: `/get-paginated-data?page=${nextPage}&hideForm=${nextPage - 1}`,
    //         success: function (data) {
                
    //             // Set the new data in the container
                
    //             $('.paginatedDataContainer').html(data);
    //             startCountdown();
    //             // Increment the page number for the next request
    //             if(nextPage<=3)
    //             nextPage++;
    //         else
    //           alert("exam over");
    //         },
    //         error: function (error) {
    //             console.error('Error fetching next page:', error);
    //         }
    //     });
    // }

    let nextPage = 2;
    let totalPages;

    function loadNextPage() {
        // Make an AJAX request to fetch the next page of data
        $.ajax({
            type: 'GET',
            url:'/get-paginated-data?page=' + nextPage,
            success: function (data, status, xhr) {
                totalPages = parseInt(xhr.getResponseHeader('X-Total-Pages')) || 1;
                // totalPages += 2
                console.log(totalPages);
                console.log(nextPage);
                // Set the new data in the container
                 console.log(data);
                $('.paginatedDataContainer').html(data);


                
                
                
                startCountdown();
                

                // Increment the page number for the next request
                if(nextPage<=totalPages){
                nextPage++;
                }
            else {
            window.location.href = '/next-page';
             // Use replaceState to replace the current page's URL with the new one
             var newUrl = window.location.origin + '/next-page';
                window.history.replaceState({ path: newUrl }, '', newUrl);
                // Redirect to /next-page
            }
            },
            error: function (error) {
                console.error('Error fetching next page:', error);
            }
        });
    }

    $(document).ready(function() {
    // Disable back button and clear session on popstate event
    history.pushState({}, '', '/userinstruct');

    
    $(window).on('popstate', function() {
        console.log('popstate event triggered');
        // Make an AJAX request to clear the session
        $.ajax({
            url: '/clear-session', // Replace with your actual route
            method: 'POST',
            
            data:{
              _token: '{{ csrf_token()}}'}, // Replace with your actual session key
            success: function(response) {
                console.log('Session cleared successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error clearing session:', error);
            }
        });
    });


    // $(window).on('beforeunload', function() {
    //     console.log('refresh event triggered');
    //     // Make an AJAX request to clear the session
    //     $.ajax({
    //         url: '/clear-session', // Replace with your actual route
    //         method: 'POST',
            
    //         data:{
    //           _token: '{{ csrf_token()}}'}, // Replace with your actual session key
    //         success: function(response) {
    //             console.log('Session cleared successfully');
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error clearing session:', error);
    //         }
    //     });
    // });

  
});
</script>


</body>
</html>
