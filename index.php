<!DOCTYPE html>
<?php include('./view/head.php');
include('./php/connect.php');?>
<body>
  <header>
      <div class="home">
        HOME
      </div>
      <form class="search" method="get">
        <input type="search" class="searchbox" placeholder="Search" name="search">
        <button type="submit" class="searchbtn"><i class="fas fa-search"></i></button>
      </form>
      <div class="login">
        <!-- Login 세션 -->
        <!-- 로그인 되었을때 (닉네임, 장바구니(세션id post), 마이페이지(세션id post), 로그아웃) -->
        <!-- 로그인 안되었을때 (로그인, 회원가입) -->
      </div>
      <div class="buylist">
        장바구니
      </div>
  </header>
  <div class="main_layer">
    <!-- 파라미터 값에 따른 출력 담당 -->
    <?php include('./php/printMain.php');?>
  </div>
</body>
</html>
