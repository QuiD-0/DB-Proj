<?php
if(!isset($_SESSION['user_id'])){
  header("location: $locate/view/login.html");
}
else{
  $key=$_GET['buy'];
  echo "이름 {$key}";
}

 ?>
