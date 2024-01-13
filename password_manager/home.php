<?php
session_start();
$table = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: black;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 89%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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

        a#myButton:hover {
            background-color: #0056b3;
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
       <h1>PASSWORD MANAGER</h1>
    <form action="" method="post" >
    <a id="myButton" href="show.php"> SHOW DETAILS</a>
    <input type="text" placeholder="enter your website name" name="web"><br>
    <input type="email" placeholder="enter your email" name="email"><br>
    <input type="password" placeholder="enter your password" name="pass"><br>
    <input type="submit" value="submit" name="sbt">
    </form>
</body>
</html>


<?php

 if(isset($_REQUEST['sbt'])){
include "connection.php";

$a = $_REQUEST['web'];
$b = $_REQUEST['email'];
$c = $_REQUEST['pass'];


if(!$a OR !$b OR !$c){
    echo "<script>alert('Please fill all fields')</script>";
}
else{
    $sql = "insert into $table(website , email , password) values('$a' ,'$b' ,'$c');";
$result= mysqli_query($conn ,$sql);
if($result){
    header("location:show.php");
}
}
 }
include('footer.php');
?>

