<?php
//managepage의 중앙 부분 출력담당

include('connect.php');
//id가 없을 경우 id=home으로 세팅
//모두 출력
if (!isset($_GET['id'])) {
    $_GET['id']="home";
}

//검색시 출력 (사진, 이름, 가격,자세히보기버튼, 구매버튼, 장바구니버튼,)
if(isset($_GET['search'])){
  echo '<h1>ㅎㅇ</h1>';
}
//책 디테일 페이지 (이름, 사진, 설명, 가격,글쓴이, 구매, 장바구니, 댓글 )
if(isset($_GET['book'])){
  $key=$_GET['book'];
  echo "이름 {$key}";
}
//구매 페이지 (이름, 사진, 수량정하기, 주소, 결제버튼 ) -> 구매 프로세스 post


//장바구니 페이지 (이름, 사진, 구매, 모두 구매-히든인풋 모두 post하기 )


//마이페이지 (개인정보, 구매 내역) post


?>
