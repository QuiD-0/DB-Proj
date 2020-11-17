<?php
include('connect.php');
if(!isset($_SESSION['user_id'])){
  header("location: $locate/view/login.html");
}
else{
  $key=$_GET['basket'];
  $id=$_SESSION['user_id'];
  $sql="SELECT count(book_name) FROM heroku_8c68daa40504b72.basket where user_id ='$id'and book_name='$key'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $total = $row[0];
  if (!$total){
      $sql="INSERT INTO basket VALUES('$id','$key')";
      mysqli_query($conn, $sql);
      echo "<script>alertRedirect(\"장바구니에 담았습니다.\");</script>";

    }else{
      echo "<script>alertRedirect(\"이미 장바구니에 있는 책 입니다.\");</script>";
    }
}

 ?>
