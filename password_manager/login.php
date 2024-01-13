<?php

include "loginconn.php";
$sql = "select * from logindetail";
$result = mysqli_query($con , $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        /* Define your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 360px;
            margin: 0 auto;
            padding: 20px;
            background-color: black;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888888;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
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

        #myButton {
            display: block;
            text-align: center;
            margin-top: 10px;
            background-color: #0056b3;
            color :white;
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
  </div>
</nav>
      <h1>LOGIN to see your details </h1>
    <form >
      <input type="text" placeholder="enter your email / phonenumber" name="em"><br>
      <input type="text" placeholder="enter your password" name="pass"><br>
      <input type ="submit" value = "submit" name = "sbt">
      <a id="myButton" href="index.php">BACK</a>
    </form>
</body>
</html>

<?php
if(isset($_REQUEST['sbt'])){
    
    session_start();
    $a = $_REQUEST['em'];
    $b =$_REQUEST['pass'];
 
    $sql3 = "select * from logindetail where password ='$b' AND (email = '$a' OR phone = '$a')";


    $result3 = mysqli_query($con , $sql3);
    $row3=mysqli_fetch_assoc($result3);
    
    if(!$a OR !$b){
        echo "<script>alert('Please fill all fields')</script>";
    }
    else{
    if ($row3['email']== $a OR $row3['phone']== $a AND $row3['password']==$b) {
        $_SESSION['name'] = $row3['name'];

        header("location: home.php");
    }else{
        header("location: login.php");
    }

}
}
include('footer.php');
?>