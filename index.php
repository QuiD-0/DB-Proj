<!DOCTYPE html>
<?php include('./view/head.php');
include('./php/connect.php');?>
<?php session_start(); ?>

<body>
    <header>
        <div class="top">
            <div class="home">
                <a href="/">Bookstore</a>
            </div>
            <form class="search" method="get">
                <input type="search" class="searchbox" placeholder="Search" name="search">
            </form>
            <div class="login">
                <!-- Login 세션 -->
                <?php include('./php/checklogin.php')?>
            </div>
        </div>
    </header>
    <div class="main_layer">
        <!-- 파라미터 값에 따른 출력 담당 -->
        <?php include('./php/printMain.php');?>
    </div>
    <!-- 관리자 페이지로 가는 버튼 -->
</body>

</html>
