<?php
//form input name= checkbox POST하기
$key=$_SESSION['user_id'];
$sql="SELECT count(book_name) FROM basket where user_id= '$key'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$total = $row[0];
if ($total==0){
echo "장바구니 비어있음 //css추가";
}else{
echo "<form action=\"/?buy=list\" method=\"post\" name=\"num_check\" >";
$sql="SELECT * FROM basket inner Join books where basket.book_name = books.book_name and user_id='$key'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  $templet="
  <div class=\"book-container\">
            <img class= \"thumnail\" src=\"{$row['book_cover']}\" alt=\"{$row['book_name']}\">
            <b><div class=\"bookname\" title=\"{$row['book_name']}\">{$row['book_name']}</div></b>
            <em><div class=\"author\" title=\"{$row['author']}\">{$row['author']} </div></em>
            <div class=\"btn-container\">
            <input type=\"checkbox\" name=\"checkbox[]\" value=\"{$row['book_name']}\" class=\"check\">
            <input type=\"hidden\" name=\"pricebox[]\" value=\"{$row['price']}\">
            <div class=\"btn\">{$row['price']}원</div>
            <a href=\"/?buy={$row['book_name']}\">
                <div class=\"btn\">구매</div>
            </a>
            </div>
    </div>
    ";
    echo "$templet";
}
echo "<input type=\"button\" value=\"선택 구매\" class=\"select_buy_btn\" onclick=\"numcheck()\">";
echo "</form>";

}
 ?>
