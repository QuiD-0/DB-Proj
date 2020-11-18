<?php
$sql="SELECT * FROM heroku_8c68daa40504b72.books order by count desc limit 10";
$result = mysqli_query($conn, $sql);
echo "<div class='best'>베스트셀러 TOP 10</div>";
while ($row = mysqli_fetch_array($result)) {
  $templet="
  <div class=\"book-container\">
      <a href=\"/?detail={$row['book_name']}\">
          <img class= \"thumnail\" src=\"{$row['book_cover']}\" alt=\"{$row['book_name']}\">
          <b><div class=\"bookname\"title=\"{$row['book_name']}\">{$row['book_name']}</div></b>
          <em><div class=\"author\" title=\"{$row['author']}\">{$row['author']} </div></em>
          <div class=\"btn-container\">
          <div class=\"price_box\">{$row['price']}원</div>
          <a href=\"/?basket={$row['book_name']}\">
              <div class=\"btn\">담기</div>
          </a>
          <a href=\"/?buy={$row['book_name']}\">
              <div class=\"btn\">구매</div>
          </a>
          </div>
      </a>
  </div>
  ";
  echo "$templet";
}
echo "<br><a href=\"/?page=1\" style=\"float:right\">+ 더보기</a>";
?>
