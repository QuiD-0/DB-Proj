<?php

$db_host="us-cdbr-east-02.cleardb.com";    //접속할 IP: 서버 PHP에서 해당 로컬 호스트 DB로 접속하기에 localhost
$db_id="b908d43908fdb1";
$db_pw="1c41a4ab";
$db_name="heroku_8c68daa40504b72";

$conn=mysqli_connect("$db_host" ,"$db_id", "$db_pw", "$db_name");
mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");

 ?>
