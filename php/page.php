<?php
$query = "SELECT count(book_id) FROM books";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$total = $row[0]; // 전체글수
echo "{$total}<br>";
$page = $_GET['page'];
echo $page;
?>
