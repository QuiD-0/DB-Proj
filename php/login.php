<?php
session_start();
include('connect.php');
include('hash.php');
$id = $_POST['id'];
$pw = $_POST['pw'];
//해시 알고리즘으로 비밀번호 해싱
$hash_pw =$pw;
$result = mysqli_query($conn, "SELECT * FROM heroku_8c68daa40504b72.user WHERE user_id = '$id'");
$array = mysqli_fetch_array($result);
//form 에서 입력받은 userpw를 해싱
$hash_password  = $array[1];
if ($pw== $hash_password) {
    //로그인 성공
    $_SESSION['user_id']=$id;
    $_SESSION['user_nick']=$array['nickname'];
    header('location:../index.php');
} else {
    //로그인 실패
    header('location:../view/login.html');
}
