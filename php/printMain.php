<?php
//managepage의 중앙 부분 출력담당
$locate='https://db-bookstore-proj.herokuapp.com';
include('connect.php');
//id가 없을 경우 id=home으로 세팅
if (!isset($_GET['id'])) {
    $_GET['id']="home";
}
//home 일때 메인 페이지 10개만
if ($_GET['id']=='home'&& !isset($_GET['search'])&&!isset($_GET['buy'])&&!isset($_GET['detail'])&&!isset($_GET['basket'])
&& !isset($_GET['page'])&& !isset($_GET['user_basket'])&& !isset($_GET['mypage'])&& !isset($_GET['delete'])) {
  include('home.php');
}
//검색시 출력 (사진, 이름, 가격,자세히보기버튼, 구매버튼, 장바구니버튼,)
if(isset($_GET['search'])){
  include('search.php');
}
//책 디테일 페이지 (이름, 사진, 설명, 가격,글쓴이, 구매, 장바구니, 댓글 )
if(isset($_GET['detail'])){
  include('detail.php');
}
//장바구니 담기
if(isset($_GET['basket'])){
  include('basket_process.php');
}
//구매
if(isset($_GET['buy'])){
  include('buypage.php');
}
//더보기 페이지네이션
if(isset($_GET['page'])){
  include('page.php');
}
if(isset($_GET['user_basket'])){
  include('print_basket.php');
}
if(isset($_GET['mypage'])){
  include('mypage.php');
}
if(isset($_GET['delete'])){
  include('delete.php');
}
?>
