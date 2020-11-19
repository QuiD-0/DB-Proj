<script type="text/javascript" src="../func.js"></script>
<?php
// 1개 일경우
$locate='https://db-bookstore-proj.herokuapp.com/';
include('connect.php');
$price = $_POST['all_price'];
$id = $_POST['user_id'];
if($_POST['type']=="single"){
  $book=$_POST['book'];
  //sql
  $sql="INSERT INTO heroku_8c68daa40504b72.buy (buy_time,price,user_id,book_name) VALUES(NOW(),'$price','$id','$book')";
  mysqli_query($conn, $sql);
  $sql="SELECT * FROM heroku_8c68daa40504b72.books where book_name='$book'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $key=$row['count']+1;
  $sql="UPDATE books SET count='$key' WHERE book_name='$book'";
  mysqli_query($conn,$sql);
  //구매한 책 장바구니에서 제거
  $sql="DELETE FROM heroku_8c68daa40504b72.basket where user_id='$id' and book_name='$book'";
  mysqli_query($conn,$sql);
  $sql="SELECT * FROM heroku_8c68daa40504b72.user where user_id='$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $key=$row['cash']-$price;
  $sql="UPDATE user SET cash='$key' WHERE user_id='$id'";
  mysqli_query($conn,$sql);
}
// 여러개일 경우
else if($_POST['type']=="multi"){
  //책 이름 배열 받기
  $arr = $_POST['checkbox'];
  $price_arr=$_POST['pricebox'];
    // buy에 저장
  for ($i=0;$i<count($arr);$i++){
    $sql="INSERT INTO heroku_8c68daa40504b72.buy (buy_time,price,user_id,book_name) VALUES(NOW(),'$price_arr[$i]','$id','$arr[$i]')";
    mysqli_query($conn, $sql);
  }
  //구매한 책 count증가
  for ($i=0;$i<count($arr);$i++){
    $sql="SELECT * FROM heroku_8c68daa40504b72.books where book_name='$arr[$i]'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $key=$row['count']+1;

    $sql="UPDATE books SET count='$key' WHERE book_name='$arr[$i]'";
    mysqli_query($conn,$sql);
    //구매한 책 장바구니에서 제거
    $sql="DELETE FROM heroku_8c68daa40504b72.basket where user_id='$id' and book_name='$arr[$i]'";
    mysqli_query($conn,$sql);
  }
  //구매자 금앱 차감
  $sql="SELECT * FROM heroku_8c68daa40504b72.user where user_id='$id'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $key=$row['cash']-$price;
  $sql="UPDATE user SET cash='$key' WHERE user_id='$id'";
  mysqli_query($conn,$sql);
}
echo "<script>alertRedirectHome(\"구매완료\",'$locate');</script>";

 ?>
