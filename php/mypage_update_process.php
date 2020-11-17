<?php
include('connect.php');
$name=$_POST['mypage-name'];
$nick=$_POST['mypage-nick'];
$phone=$_POST['mypage-phone'];
$addr=$_POST['mypage-addr'];
$id=$_POST['user'];
$sql="UPDATE user SET nickname='$nick',phone='$phone',addr='$addr',name='$name' WHERE user_id='$id'";
mysqli_query($conn,$sql);
$prevPage = $_SERVER['HTTP_REFERER'];
header('location:'.$prevPage);
 ?>
