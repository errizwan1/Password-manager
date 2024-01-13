<?php
session_start();
$table = $_SESSION['name'];
include "connection.php";
$id = $_REQUEST['id'];
$sql = "select * from $table WHERE sno = '$id'";
$result = mysqli_query($conn , $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Form Styling</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

            h1 {
            text-align: center;
        }

        form {
            width: 385px;
            margin: 0 auto;
            padding: 20px;
            background-color: black;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #888888;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .button {
            display: inline-block;
            padding: 8px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .button:hover {
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
    <h1>UPDATE YOUR DETAILS</h1>
    <form action="" method="post">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <input type="text" name="website" value="<?php echo $row['website']; ?>" readonly>
        <input type="email" name="email" value="<?php echo $row['email']; ?>">
        <input type="text" name="password" value="<?php echo $row['password']; ?>">
        <input type="submit" value="Submit" name="sbt">
        <a href="show.php" class="button">Back</a>
        <?php } ?>
    </form>
</body>
</html>

<?php
if(isset($_REQUEST['sbt'])){
    $a = $_REQUEST['email'];
    $b = $_REQUEST['password'];

    $sql1 = "UPDATE  $table set email = '$a' , password = '$b' WHERE sno = '$id';";
    $result1 = mysqli_query($conn , $sql1);

    if($result1){
         header("location:show.php");
        echo "failed".mysqli_error($conn);
    }
}
include "footer.php";
?>