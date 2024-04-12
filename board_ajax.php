<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");


$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");


$oper = $_POST['oper'];
if ($oper == "board") {
      $sql = "SELECT * from board";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array( $row["account"],$row["item_name"], "<img src='".$row["item_img"]."'width='80 height = '80'>", $row["item_price"], $row["content"]);
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}
?>