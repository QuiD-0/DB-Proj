<?php
$sql="SELECT * FROM heroku_8c68daa40504b72.books";
$result = mysqli_query($conn, $sql);
echo "<div class='best'></div>";
while ($row = mysqli_fetch_array($result)) {
  $templet="
  <div class=\"book-container\">
      <a href=\"/?detail={$row['book_name']}\">
          <img src=\"{$row['book_cover']}\" alt=\"{$row['book_name']}\">
          <b><div class=\"bookname\">{$row['book_name']}</div></b>
          <em><div class=\"author\">저자</div></em>
          <div class=\"btn-container\">
          <a href=\"/?buscket=name\">
              <div class=\"btn\">담기</div>
          </a>
          <a href=\"/?buy=name\">
              <div class=\"btn\">구매</div>
          </a>
          </div>
      </a>
  </div>
  ";
  $count=1;
  echo "$templet";
  if ($count%5==0){
    echo "<div>다이브</div>";
  }
  $count+=1;
} ?>
