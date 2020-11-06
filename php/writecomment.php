<?php
include('connect.php');
$name=$_POST['nickname'];
$comment=$_POST['comment'];
$bookname=$_POST['bookname'];


$sql="INSERT INTO heroku_8c68daa40504b72.comment VALUES('$bookname','$comment','$name',NOW())";
mysqli_query($conn, $sql);
header("location: $locate/?detail=$bookname");
 ?>
