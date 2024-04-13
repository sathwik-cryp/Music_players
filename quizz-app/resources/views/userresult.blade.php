
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
         .container {
      max-width: 1800px;
      margin: 0 auto; /* Removed conflicting 'text-align: center' */
    }

    .row {
      margin-top: 20px;
    }

    table { 
      width:700px;
      border-collapse: collapse;
      margin: 0 auto; /* Use margin instead of 'margin: auto;' for correct centering */
      border: 1px solid #dddddd; /* Removed inline border attribute */
    }

    th, td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: center;
      width:50%
    }

    h2 {
     text-align:center;
     margin-left: 610px;

    }

    .done-button-container {
        /* display: flex;
        justify-content: flex-end; */
        margin-top: 20px; 
        margin-left:150px;
    }
.pg{
  margin-left: 200px;
}
    .btn-block {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
           
            margin-left:200px;
        }

        .btn-block:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }
    </style>
</head>
<body>

<div class="container" style="max-width:1800px;">
      
      <div class="row">
          <div class="col-md-8 col-md-offset-2" style="margin-top:20px;">
              <h2 style="text-align:center;" >Welcome to Admin dashboard</h2>
          </div>
         
      </div>
      <br>
      
    <div style="display:inline-block; margin:auto;">
    
  </div>
  <br>
 
                    <div class="done-button-container">
        <a href="/taskmanage" class="btn btn-primary btn-block"><i class="fa-solid fa-left-long"></i></a>
    </div>  
  
<table border=1px style="box-shadow: 2px 2px 10px rgba(0, 0, 0, 1); border-radius: 50px; overflow:hidden;" >
  <tr style="text-align:center;" >
 
 
  <td><b>User id</b></td>
  <td><b>Message</b></td>
 
</tr>
  @foreach($collection as $item)
  
  <tr >
  
  
  <td>{{$item['user_id']}}</td>
  <td>{{$item['message']}}</td>

 
</tr>

  @endforeach
  
       
</table>
<div class="pg">
{{ $collection->links() }}
</div>

<br>
<br>


</div>

</body>
</html>
 
 