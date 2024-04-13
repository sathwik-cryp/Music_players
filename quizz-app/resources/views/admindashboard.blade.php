
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}


/* th {
  background-color: #f2f2f2;
  border: 1px solid #dddddd;
  padding: 8px;
  text-align: center;
} */


td {
  border: 1px solid #dddddd;
  padding: 8px;
  text-align: center;
}


tr:nth-child(even) {
  background-color: #f9f9f9;
}


.del {
  padding: 6px 10px;
  background-color: #ff6347;
  color: white;
  border: none;
  cursor: pointer;
}


/* .abc {
  display: block;
  margin-left: auto;
  margin-right: auto;
} */
form {
  /* text-align: center; */
  margin-bottom: 20px;
}

/* Style for input fields */
input[type="text"] {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 5px;
  width: 200px;
}

/* Style for submit buttons */
button[type="submit"] {
  padding: 8px 16px;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Style for submit button on hover */
button[type="submit"]:hover {
  background-color: #45a049;
}
.w-5{
        display:none;
    }
    .custom-width {
    width: 200px; /* Adjust the width as needed */
}
    </style>
</head>
<body>

<div class="container" style="max-width:1800px;">
      
      <div class="row">
          <div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
              <h2 style="text-align:center; margin-left:500px;">All the Questions</h2>
          </div>
          <br>
      </div>
     
    <div style="display:inline-block; margin:auto;">
    
  </div>
  <br>
  
<table border=1px >
  <tr style="text-align:center;" >
  <td><b>Question</b></td>
  <td><b>Option 1</b></td>
  <td><b>Option 2</b></td>
  <td><b>Option 3</b></td>
  <td><b>Option 4</b></td>
  <td><b>Correct Option</b></td>
  <td><b>Time Alloted</b></td>
</tr>
  @foreach($collection as $item)
  
  <tr data-row-id="{{ $item['id'] }}">
  
  <td>{{$item['question']}}</td>
  
  
  <td>{{$item['option1']}}</td>
  <td>{{$item['option2']}}</td>
  <td>{{$item['option3']}}</td>
  <td>{{$item['option4']}}</td>
  <td>{{$item['correct_option']}}</td>
  <td>{{$item['time_alloted']}}</td>
  <td><button class="del"><i class="fa-solid fa-trash"></i></button></td>
  <td><button class="upd"><i class="fa-solid fa-pen-to-square"></i></button></td>
</tr>

  @endforeach
</table>
 
<br>
<br>
</div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="/taskmanage" class="btn btn-primary btn-block custom-width"><i class="fa-solid fa-left-long"></i></a>
<script>
        $(document).ready(function() {
            $('.del').click(function() {
               
                 $button = $(this);
                 console.log($button);
               
                var rowId = $button.closest("tr").data("row-id");
                 console.log(rowId);

               
                jQuery.ajax({
                    url: '/del/'+rowId, 
                    method: "GET",
                    
                    
                    success: function(response) {
                     console.log(response);
                        
                        if (response.code == 200) {
                            
                            $button.closest("tr").remove();
                        }
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            });
            
        });


        $(document).ready(function() {
        $('.upd').click(function() {
            $button = $(this);
            var rowId = $button.closest("tr").data("row-id");

            // Redirect to the update route
            window.location.href = '/update/' + rowId;
        });
    });
    </script>
</body>
</html>
 
 