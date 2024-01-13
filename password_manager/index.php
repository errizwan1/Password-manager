<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>L O G I N</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 365px;
            margin: 0 auto;
            padding: 20px;
            background-color: black;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888888;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
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
            color : black;
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
    <h1>SIGN UP</h1>
    <form action="" method="post">
    <input type="text" placeholder="enter your name" name="name"><br>
    <input type="email" placeholder="enter your email" name="email"><br>
    <input type="text" placeholder="enter your number" name="num"><br>
    <input type="password" placeholder="enter your password" name="pass"><br>
    <input type="submit" value="submit" name="sbt">
    </form>

    <a id="myButton" href="login.php">Already have an account / Sign In</a>
    
</body>
</html>

<?php

include "loginconn.php";

include "connection.php";


if(isset($_POST['sbt'])){ 
    $a = $_POST['name'];
    $b = $_POST['email'];
    $c = $_POST['num'];
    $d = $_POST['pass'];

    if(empty($a) || empty($b) || empty($c) || empty($d)){
        echo "<script>alert('Please fill all fields')</script>";
    } else {

        $sql = "INSERT INTO logindetail (name, email, phone, password) VALUES ('$a', '$b', '$c', '$d');";

        $result = mysqli_query($con, $sql);

        if($result) {

            $sql1 = "create table $a (sno int primary key auto_increment, website varchar(30) , email varchar(30) , password varchar(50));";
            $result2 = mysqli_query($conn , $sql1);
          if($result2){ 
            header("location: login.php");
          }
        } else {
            die("Error in query: " . mysqli_error($con));
        }
    }
}
?>
<?php include('footer.php') ?>