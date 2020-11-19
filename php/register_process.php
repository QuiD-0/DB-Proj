<script type="text/javascript" src="../func.js"></script>
<?php
include("./connect.php");
$id=$_POST['id'];
$pw=$_POST['pw'];
$nick=$_POST['nick'];
$name=$_POST['name'];
$addr=$_POST['addr'];
$phone=$_POST['phone'];

//id 중복 체크
$sql="SELECT count(user_id) From user where user_id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if ($row[0]==1){
  echo "<script>alertRedirect(\"중복된 ID 입니다.\");</script>";
}
else{
  if (strlen($pw)<7){
    echo "<script>alertRedirect(\"Password 는 7자 이상이여야 합니다.\");</script>";
  }
  else{
    // 회원 추가 처리
    $sql="INSERT INTO user VALUES('$id','$pw','$nick','$phone',100000,'$addr','$name')";
    mysqli_query($conn,$sql);
    echo "<script>alertRedirectHome(\"회원가입이 완료 되었습니다.\",'$locate');</script>";
  }
}




 ?>
