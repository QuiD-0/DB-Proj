<?php
$id=$_POST['id'];
$arr=$_POST['checkbox'];
for ($i=0;$i<count($arr);$i++){
  $sql="DELETE FROM basket where user_id='$id' and book_name='$arr[$i]'";
  mysqli_query($conn, $sql);
}
echo "<script>alertRedirect(\"장바구니에서 제거되었습니다.\")</script>";
 ?>
