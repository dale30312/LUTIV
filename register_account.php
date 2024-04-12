<?php
error_reporting(0);
$user = trim($_GET[id_number]);
$pw = trim($_GET[pw]);
$phone = trim($_GET[phone]);
$mail = trim($_GET[mail]);

$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$sql = "insert into member values ('" . $user . "','" . $pw . "','" .  $phone . "','" . $mail .  "','" . "member" . "')";

    $result = mysqli_query($link, $sql);
 mysqli_close($link); // 關閉資料庫連結   
?>