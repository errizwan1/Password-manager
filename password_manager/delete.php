<?php
session_start();
$table = $_SESSION['name'];
include "connection.php";
$a = $_REQUEST['id'];
$sql = "DELETE FROM $table WHERE sno = '$a'";
$result = mysqli_query($conn , $sql);

if(isset($result)){
    header ('Location:show.php');
}
?>