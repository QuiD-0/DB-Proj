<?php
$id=$_SESSION['user_id'];
$sql="SELECT * FROM heroku_8c68daa40504b72.user where user_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$templet="<p class=\"mypage-text\">내 정보</p>
<form class=\"mypage\" action=\"./php/mypage_update_process.php\" method=\"post\" name=\"mypageform\">
  <div class=\"mypage-container\">
    <label for=\"mypage-name\">이름</label>
    <input type=\"text\" name=\"mypage-name\" value=\"{$row[6]}\">
    </div>
    <div class=\"mypage-container\">
    <label for=\"mypage-nick\">닉네임</label>
    <input type=\"text\" name=\"mypage-nick\" value=\"{$row[2]}\">
    </div>
    <div class=\"mypage-container\">
    <label for=\"mypage-phone\">전화 전호</label>
    <input type=\"text\" name=\"mypage-phone\" value=\"{$row[3]}\">
    </div>
    <div class=\"mypage-container\">
    <label for=\"mypage-addr\">주소</label>
    <input type=\"text\" name=\"mypage-addr\" value=\"{$row[5]}\">
    </div>
    <input type=hidden value=\"{$id}\" name=\"user\">
   <div class=\"remain\">남은 금액 : {$row[4]} 원</div>

  <input type=\"submit\" class=\"update-btn\" value=\"수정하기\">
</form>";
echo $templet;
// 구매내역
echo "<p class=\"mypage-text\">최근 구매 내역</p>";
echo "<div class=\"mybuylist\">";
$sql="SELECT count(user_id) FROM buy where user_id ='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if ($row[0]==0)
{
  echo "<i class=\"fas fa-truck-moving\"></i><div class=\"empty\">구매 내역이 없습니다.</div>";
}else{
  $sql="SELECT * FROM buy inner join books where buy.book_name = books.book_name and user_id ='$id' order by buy_time desc limit 10";
  $result = mysqli_query($conn, $sql);
  echo "<li>";
  while($row = mysqli_fetch_array($result)){
  echo"<ul><img src=\"{$row['book_cover']}\">
      <div class=\"buyname\">{$row['book_name']}</div>
      <div class=\"buyauthor\">{$row['author']}</div>
      <div class=\"buyprice\">{$row['price']} 원</div>
  </ul>";
  }
  echo "</li></div>";
}

 ?>
