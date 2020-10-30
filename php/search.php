<?php
$key = $_GET['search'];
$query = "SELECT * FROM books WHERE description OR book_name LIKE '%$key%'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) == "0"){
  echo "없음";
}
else{
  while ($row = mysqli_fetch_array($result)) {

      echo "{$row[1]}";
      // 양식 맞춰 출력
  };
}

?>
