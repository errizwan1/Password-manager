<?php
session_start();
$table = $_SESSION['name'];
include "connection.php";
$sql = "select * from $table" ;
$result = mysqli_query($conn ,$sql);
include('footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        a#myButton {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .copy-email:hover,.copy-button:hover {
            background-color: #0056b3;
        }

        .delete-link ,.edit-link{
        display: inline-block;
        padding: 8px 12px;
        background-color: #ff4d4d; 
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold; 
    }

    .delete-link:hover ,.edit-link:hover  {
        background-color: #ff0000;
    }
    
    .navbar-brand{
            color:white;
        }
    </style>
</head>
<body>
<nav class="navbar" style="background-color: black;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PASSx</a>
    <a class = "navbar-brand">Hello <?php
    echo $_SESSION['name'];?></a>
  </div>
</nav>
    <table border = 1 >
        <tr>
            <th>WEBSITE</th>
            <th colspan='2'>EMAIL</th>
            <th colspan='2'>PASSWORD</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>

        <?php
       while($row = mysqli_fetch_assoc($result)){
           ?>
           <tr>
               <td><?php echo $row['website']?></td>
               <td><?php echo $row['email']?></td>
               <td><button class="copy-email" data-clipboard-text="<?php echo $row['email']?>">Copy</button></td>
               <td><?php echo $row['password']?></td>
               <td><button class="copy-button" data-clipboard-text="<?php echo $row['password']?>">Copy</button></td>
               <td><a href='edit.php?id=<?php echo $row['sno']?>' class="edit-link">Edit</a></td>
               <td><a href='delete.php?id=<?php echo $row['sno']?>' class="delete-link">Delete</a></td>
           </tr>
     <?php } ?>
      <a id="myButton" href="home.php">ADD DETAILS</a>
      <a id="myButton" href="logout.php">LOG OUT</a>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
   <script>
       var clipboard = new ClipboardJS('.copy-email');
       var clipboard = new ClipboardJS('.copy-button');

       clipboard.on('success', function(e) {
           console.log(e);
           document.querySelectorAll(".copy-email").innerText="copied"
       });

       clipboard.on('error', function(e) {
           console.log(e);
       });
   </script>
</body>
</html>
