<?php
session_start();
error_reporting(0);
$user = trim($_GET[id_number]);
$pw = trim($_GET[pw]);
$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

$sql = "SELECT * FROM member where account='$user' and pw = '$pw'"; // 指定SQL查詢字串

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

// 送出查詢的SQL指令
if ($result = mysqli_query($link, $sql)) {
   if ($row = mysqli_fetch_assoc($result)) {
      echo "1";//帳號已存在
      $_SESSION['status'] = 1;
      $_SESSION['id_number'] = $user ;
      
      if (strcmp($_SESSION['id_number'], 'admin')==0)
      	$_SESSION['type'] = 1;
      else
      	$_SESSION['type'] = 0;
   } 
   else {
      echo "0";//帳號不存在
      $_SESSION['status'] = 0;
   }
   mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>