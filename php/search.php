<?php
$key = $_GET['search'];
$query = "SELECT * FROM books WHERE description LIKE '%$key%' OR book_name LIKE '%$key%' OR author LIKE '%$key%'";
$result = mysqli_query($conn,$query);
//검색 결과가 없을경우
if(mysqli_num_rows($result) == "0"){
  $templet="
  <div class=\"emptybasket\"><i class=\"fas fa-search\"></i><div class=\"empty\">검색결과가 없습니다.</div><div>
  ";
  echo $templet;
}
//검색 결과가 있을 경우
else{
  while ($row = mysqli_fetch_array($result)) {
    $templet="
    <div class=\"book-container\">
          <a href=\"/?detail={$row['book_name']}\">
              <img class= \"thumnail\" src=\"{$row['book_cover']}\" alt=\"{$row['book_name']}\">
              <b><div class=\"bookname\">{$row['book_name']}</div></b>
              <em><div class=\"author\">{$row['author']} </div></em>
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
      echo $templet;
      // 양식 맞춰 출력
  };
}

?>
