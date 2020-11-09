<?php
if(!isset($_SESSION['user_id'])){
  header("location: $locate/view/login.html");
}
//여러개 구매 - 장바구니에서 넘어옴
else{
  $id=$_SESSION['user_id'];
  $sum=0;
  if($_GET['buy']=="list"){
    $key=$_POST['checkbox'];
    echo "<div class=\"buylist\">";
    echo "<p class=\"check\">구매 확인</p>";
    for($i=0;$i<count($key);$i++){
      //sql
      //{$key[$i]}이용
      $sql="SELECT * FROM heroku_8c68daa40504b72.books where book_name = '{$key[$i]}'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $sum+=$row['price'];
      $templet="
      <div class=\"book\">
          <img src=\"{$row['book_cover']}\">
          <div class=\"bookname\">
              {$row['book_name']}
          </div>
          <div class=\"author\">{$row['author']}</div>
          <div class=\"price\">{$row['price']} 원</div>
      </div>
      ";
      echo $templet;
    }
    //여러개 인자값 넘기기
    $sql2="SELECT * FROM heroku_8c68daa40504b72.user where user_id = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    echo "</div>
    <div class=\"checklist\">
      <p class=\"checkinfo\">개인 정보 확인</p>
        <form action=\"./php/buy_process.php\" method=\"post\" name=\"formcheck\">
          <div class=\"info\">
            <label>이름</label>
            <input type=\"text\" name=\"name\" value=\"{$row2['name']}\" placeholder=\"이름\">
            <label>전화번호</label>
            <input type=\"text\" name=\"phone_number\" value=\"{$row2['phone']}\" placeholder=\"전화 번호\">
            <label>주소 </label>
            <input type=\"text\" name=\"addr\" value=\"{$row2['addr']}\" class=\"addr\" placeholder=\"주소\">
              </div>
              <div class=\"purchase\">
            <div class=\"all_price\">총 금액<br>
              <div class=\"money\">{$sum}</div>원</div>
            <div class=\"my_cash\">
              내 지갑<br>
              <div class=\"money\">{$row2['cash']}</div>원
            </div>";
            for($i=0;$i<count($key);$i++){
              echo "<input type=\"hidden\" name=\"checkbox[]\" value=\"{$key[$i]}\">";
            }
            echo "
            <input type=\"hidden\" name=\"all_price\" value=\"$sum\">
            <input type=\"hidden\" name=\"user_id\" value=\"{$row2['user_id']}\">
            <input type=\"hidden\" name=\"type\" value=\"multi\">
            <input type=\"button\" onclick=\"check()\" class=\"purchase-btn\" value=\"결제\">
            </div>
        </form>
    </div>";

}

// 1개 구매
else{
  $key=$_GET['buy'];
  $sql="SELECT * FROM heroku_8c68daa40504b72.books where book_name = '$key'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $sql2="SELECT * FROM heroku_8c68daa40504b72.user where user_id = '$id'";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $templet="
  <div class=\"buylist\">
  <p class=\"check\">구매 확인</p>
      <div class=\"book\">
          <img src=\"{$row['book_cover']}\">
          <div class=\"bookname\">
              {$row['book_name']}
          </div>
          <div class=\"author\">{$row['author']}</div>
          <div class=\"price\">{$row['price']} 원</div>
      </div>
  </div>
  <div class=\"checklist\">
    <p class=\"checkinfo\">개인 정보 확인</p>
      <form action=\"./php/buy_process.php\" method=\"post\" name=\"formcheck\">
        <div class=\"info\">
          <label>이름</label>
          <input type=\"text\" name=\"name\" value=\"{$row2['name']}\" placeholder=\"이름\">
          <label>전화번호</label>
          <input type=\"text\" name=\"phone_number\" value=\"{$row2['phone']}\" placeholder=\"전화 번호\">
          <label>주소 </label>
          <input type=\"text\" name=\"addr\" value=\"{$row2['addr']}\" class=\"addr\" placeholder=\"주소\">
            </div>
            <div class=\"purchase\">
          <div class=\"all_price\">총 금액<br>
            <div class=\"money\">{$row['price']}</div>원</div>
          <div class=\"my_cash\">
            내 지갑<br>
            <div class=\"money\">{$row2['cash']}</div>원
          </div>
          <input type=\"hidden\" name=\"book\" value=\"{$row['book_name']}\">
          <input type=\"hidden\" name=\"all_price\" value=\"{$row['price']}\">
          <input type=\"hidden\" name=\"user_id\" value=\"{$row2['user_id']}\">
          <input type=\"hidden\" name=\"type\" value=\"single\">
          <input type=\"button\" onclick=\"check()\" class=\"purchase-btn\" value=\"결제\">
          </div>
      </form>
  </div>
  ";
  echo $templet;
}
}
 ?>
