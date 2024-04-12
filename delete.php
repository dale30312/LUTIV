<?php
header("Content-Type:text/html; charset=utf-8");
if (isset($_GET['id'])) {
	$link = mysqli_connect("localhost", "root", "root123456", "group_14") or die("無法開啟MySQL資料庫連結!<br>");
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

	$sql = "delete  from item_shopcar where id='" . $_GET['id'] . "'";
	// 送出查詢的SQL指令
	if ($result = mysqli_query($link, $sql)) {
		echo "<script>alert('資料刪除成功!');location.href='shopcart.php';</script>";
	} else {
		echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
	}

	mysqli_close($link); // 關閉資料庫連結

}

?>