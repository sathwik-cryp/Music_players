
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
    .done-button-container {
    float: right;
}
    </style>
</head>
<body>

<div class="container" style="max-width:1800px;">
      
      <div class="row">
          <div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
              <h2 >Welcome to Task creation</h2>
          </div>
          <br>
      </div>
      <br>
      <!-- <form action="/admindash" method="post"  id="search-form">
        @csrf
              <input type="text" name="search" placeholder="Search..."  id="search-input" >
              <button type="submit" id="search-button" >Search</button>
        </form> -->
       <br>
       <!-- <form action="/admindash" method="post" id="filter-form">
        @csrf
              <input type="text" name="filter" placeholder="Filter by genre"  id="filter-input" >
              <button type="submit" id="filter-button" >Filter</button>
        </form> -->
       <br>
    <div style="display:inline-block; margin:auto;">
    
  </div>
  <br>
  <form method="post" action="/adtask">
    @csrf
  
<table border=1px >
  <tr  style="text-align:center;"><td><label>
    <input type="checkbox" id="selectAll"> Select All
</label></td>
<td rowspan=2><b>Id</b></td>
<td rowspan=2><b>Question</b></td>
<td rowspan=2><b>Option 1</b></td>
<td rowspan=2><b>Option 2</b></td>
<td rowspan=2><b>Option 3</b></td>
<td rowspan=2><b>option4</b></td>
<td rowspan=2><b>Correct Option</b></td>
<td rowspan=2><b>Time Alloted</b></td></tr>
  <tr >
  <td><b>Select Task</b></td>
  
</tr>
  @foreach($collection as $item)
  
  <tr data-row-id="{{ $item['id'] }}">
  <td>
    <input type="checkbox" name="selected_questions[]"  class="item-checkbox" value="{{ $item['id'] }}">
    </td>
    <td>{{$item['id']}}</td>
  <td>{{$item['question']}}</td>
  
  
  <td>{{$item['option1']}}</td>
  <td>{{$item['option2']}}</td>
  <td>{{$item['option3']}}</td>
  <td>{{$item['option4']}}</td>
  <td>{{$item['correct_option']}}</td>
  <td>{{$item['time_alloted']}}</td>
 
</tr>

  @endforeach
  
        </form> 
</table>
<br>
<br>
<button type="submit" >submit</button>
<div class="done-button-container">
        <a href="/taskmanage" class="btn btn-primary btn-block"><i class="fa-solid fa-left-long"></i></a>
    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the "Select All" checkbox
        var selectAllCheckbox = document.getElementById("selectAll");

        // Get all checkboxes with class "item-checkbox"
        var itemCheckboxes = document.querySelectorAll(".item-checkbox");

        // Add click event listener to "Select All" checkbox
        selectAllCheckbox.addEventListener("click", function() {
            // Set the state of all item checkboxes based on the "Select All" checkbox
            itemCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        // Add click event listener to item checkboxes
        itemCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener("click", function() {
                // If any item checkbox is unchecked, uncheck the "Select All" checkbox
                if (!checkbox.checked) {
                    selectAllCheckbox.checked = false;
                }
            });
        });
    });
</script>
</body>
</html>
 
 