<?php
//form input name= checkbox POST하기
$key=$_SESSION['user_id'];
$sql="SELECT count(book_name) FROM basket where user_id= '$key'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total = $row[0];
if ($total==0){
echo "<div class=\"emptybasket\"><i class=\"fas fa-truck-moving\"></i><div class=\"empty\">장바구니가 비어있습니다.</div><div>";
}else{
echo "<form method=\"post\" name=\"num_check\" >
<input type=\"hidden\" name=\"id\" value=\"$key\">";
$sql="SELECT * FROM basket inner Join books where basket.book_name = books.book_name and user_id='$key'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  $templet="
  <div class=\"book-container\">
            <img class= \"thumnail\" src=\"{$row['book_cover']}\" alt=\"{$row['book_name']}\">
            <div class=\"bookname\" title=\"{$row['book_name']}\">{$row['book_name']}</div>
            <div class=\"author\" title=\"{$row['author']}\">{$row['author']} </div>
            <div class=\"btn-container\">
              <input type=\"checkbox\" name=\"checkbox[]\" value=\"{$row['book_name']}\" class=\"check\">
              <input type=\"hidden\" name=\"pricebox[]\" value=\"{$row['price']}\">
              <a href=\"/?buy={$row['book_name']}\">
              <div class=\"btn\">구매</div>
              </a>
              <div class=\"price_box\">{$row['price']}원</div>
            </div>
    </div>
    ";
    echo "$templet";
}
echo "<div class=\"btn-wrap\">
<input type=\"submit\" value=\"선택 구매\" class=\"select_buy_btn\" onclick=\"numcheck('/?buy=list')\">
<input type=\"submit\" value=\"선택 삭제\" class=\"select_buy_btn\" onclick=\"numcheck('/?delete')\">
</div>
</form>";

}
 ?>
