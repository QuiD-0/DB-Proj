<?php
//로그인 안되었을때 (로그인, 회원가입)
if(!isset($_SESSION['user_id'])){
  $output='
  <a href="view/login.html" class="login-btn">Log In</a>
  <a href="view/register.html" class="login-btn">회원가입</a>
  ';
  echo $output;
}

// 로그인 되었을때 (닉네임, 장바구니(세션id post), 마이페이지(세션id post), 로그아웃)
else{
  $user_id = $_SESSION['user_id'];
  $user_name = $_SESSION['user_nick'];
  $output="<div class=\"nickname\"> ${user_name}님 </div>
  <div class=\"bucket\"><i class=\"fas fa-shopping-basket\"></i></div>
  <div class=\"mypage\"><i class=\"fas fa-user\"></i></div>
  <div class=\"logout\"><a href=\"./php/logout.php\"><i class=\"fas fa-sign-out-alt\"></i></a></div>
  ";
  echo $output;

}
?>
