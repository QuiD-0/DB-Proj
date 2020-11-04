<?php
$key = $_GET['search'];
$query = "SELECT * FROM books WHERE description OR book_name OR author LIKE '%$key%'";
$result = mysqli_query($conn,$query);
//검색 결과가 없을경우
if(mysqli_num_rows($result) == "0"){
  $templet="
  <div class=\"noResultContainer\">
    <i class=\"fas fa-search\"></i>
    <div class=\"noResult\">검색 결과가 없습니다.</div>
    <a href=\"/index.php\" class=\"return\">돌아가기</a>
  </div>
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
              <div class=\"btn\">{$row['price']}원</div>
              <a href=\"/?buscket={$row['book_name']}\">
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
