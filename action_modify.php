<?php
session_start();
error_reporting(0);

$pw = trim($_GET[pw]);
$pw1 = trim($_GET[pw1]);
$user = trim($_SESSION['id_number']);
$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$sql = "UPDATE member SET pw = \"$pw1\" Where account = \"$user\"";

    $result = mysqli_query($link, $sql);
 mysqli_close($link); // 關閉資料庫連結   
?>