<?php
session_start(); 
$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");



$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];
if ($oper == "member") {
      $sql = "select * from item_basis,item_shopcar where item_basis.item_id = item_shopcar.car_item and item_shopcar.member = '". $_SESSION['id_number'] ."' order by id";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array( $row["id"],"<img src='".$row["item_img"]."'width='80 height = '80'>", $row["item_name"], $row["car_size"], $row["car_num"], $row["item_price"], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button><button type='button' class='btn btn-danger btn-xs'   id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}
else if ($oper == "delete") {
      
       if ($result = mysqli_query($link, "DELETE from item_shopcar where id='" . $_POST['caritem_id'] . "'")) {
            $a["code"] = 0;
            $a["message"] = "資料" . $arr_oper[$oper] . "成功!";
      } else {
            $a["code"] = mysqli_errno($link);
            $a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;

}




?>