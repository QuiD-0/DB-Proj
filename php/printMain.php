<?php
//managepage의 중앙 부분 출력담당

include('connect.php');
//id가 없을 경우 id=home으로 세팅
if (!isset($_GET['id'])) {
    $_GET['id']="home";
}
//home 일때 메인 페이지
if ($_GET['id']=='home'&& !isset($_GET['search'])&&!isset($_GET['book'])) {
  $sql="SELECT * FROM heroku_8c68daa40504b72.books";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $templet="
    {$row[0]}
    {$row[1]}
    {$row[2]}
    {$row[3]}
    {$row[4]}
    {$row[5]}
    ";
    echo "$templet";
  }
}

//검색시 출력 (사진, 이름, 가격,자세히보기버튼, 구매버튼, 장바구니버튼,)
if(isset($_GET['search'])){
  $as='assd';
  $templet="<h1>ㅎㅇ {$as} </h1>";
  echo $templet;
}
//책 디테일 페이지 (이름, 사진, 설명, 가격,글쓴이, 구매, 장바구니, 댓글 )
if(isset($_GET['book'])){
  $key=$_GET['book'];
  echo "이름 {$key}";
}



?>
