<?php
// 1개 일경우 db저장
$price = $_POST['all_price'];
$id = $_POST['user_id'];
if($_POST['type']=="single"){
  $key=$_POST['book'];
  //sql

}
// 여러개일 경우 db저장
else if($_POST['type']=="multi"){
  //책 이름 배열 받기
  $arr = $_POST['checkbox'];


}
// 금액 차감


 ?>
