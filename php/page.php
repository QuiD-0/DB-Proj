<?php
$query = "SELECT count(book_id) FROM books";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$articles=10; // 한화면의 목록 수
$block_set=5;
$total = $row[0]; // 전체글수
$total_page=ceil($total/$articles);//전체 페이징 수
$page = $_GET['page']; // 현재 페이지
$prev_page = $page - 1; // 이전페이지
$next_page = $page + 1; // 다음페이지
$block = ceil ($page / $block_set);
$prev_block = $block*$block_set-9; // 이전블럭
$next_block = $block*$block_set+1; // 다음블럭
$first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
$last_page = min ($total_page, $block * $block_set); // 마지막 페이지번호
$total_block = ceil ($total_page / $block_set);

if ($page<=0)$page=1;
else if($page>$total_page)$page=$total_page;

if ($page==$total_page){
  $last=$total-($page-1)*$articles;
  $key=$page*10+1;
  $query = "SELECT * FROM books order by book_id desc limit $key,$last";
}else{
  $key=$page*10+1;
  $query = "SELECT * FROM books order by book_id desc limit $key,10";
}
$result = mysqli_query($conn,$query);
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
//페이징
echo "<li class=\"paging\">";
  if ($block != 1) echo "<ul><a href=\"?page=$prev_block\">이전</a></ul>";
  for ($i=$first_page; $i<=$last_page; $i++) {
    echo "<ul><a href=\"?page=$i\">$i</a></ul>";
  }
  if ($block!=$total_block)echo "<ul><a href=\"?page=$next_block\">다음</a></ul></li>";


?>
