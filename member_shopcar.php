<?php 
session_start(); 
if(!isset($_SESSION['status'])||$_SESSION['status']!=1)
{
    header("Location:index.php");
    
}
$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    $result = mysqli_query($link,"SELECT COUNT(*) as 'count' from item_shopcar where member = '" . $_SESSION['id_number'] . "'");
    $numsun = mysqli_fetch_assoc($result);
    $cnt = $numsun['count'];
    $_SESSION['cart'] = $cnt;
    mysqli_free_result($result); // 釋放佔用的記憶體
    


    if (isset($_POST['buy_btn'])) {
        echo "<script language=\"JavaScript\">alert(\"購買成功\");</script>";

    $sql3 = "SELECT * from item_shopcar where member = '". $_SESSION['id_number'] ."' order by id";
      if ($result = mysqli_query($link, $sql3)) {
            while ($row = mysqli_fetch_assoc($result)) {
                 $sql2 = "INSERT into order123 (order_id,buy_mem,buy_item,buy_size,buy_num) values ('" . $row["id"] . "','" . $row["member"] . "','" . $row["car_item"] . "','" . $row["car_size"] . "','" . $row["car_num"] . "')";
             mysqli_query($link, $sql2);    
            }

            mysqli_free_result($result); // 釋放佔用的記憶體
            
      }
       
        $sql ="DELETE FROM item_shopcar WHERE  member = '". $_SESSION['id_number'] ."' ";
            $result = mysqli_query($link, $sql);
    }


mysqli_close($link); // 關閉資料庫連結

?>
<!DOCTYPE html>
<html>

<head>
    <title>購物車(會員)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="JS/demoacc.js"></script>
    <script src="JS/form.js"></script>
    <!-- datatable -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="JS/member_shopcar.js"></script>
    <!--  -->
</head>

<body class="w3-content" style="max-width:1200px;">
    <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b>LUTIV</b></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="./index.php" class="w3-button w3-block w3-white w3-left-align">首頁</a>
            <a href="./hotsale.php" class="w3-button w3-block w3-white w3-left-align">熱銷商品</a>
            <div style="margin-top: 20px;">
                <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                    上衣類 <i class="fa fa-caret-down"></i>
                </a>
                <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="./details.php?detailname=短袖 / 背心" class="w3-bar-item w3-button">短袖、背心</a>
                    <a href="./details.php?detailname=POLO衫" class="w3-bar-item w3-button">POLO衫</a>
                    <a href="./details.php?detailname=七分 / 長袖" class="w3-bar-item w3-button">七分/長袖</a>
                    <a href="./details.php?detailname=厚棉系列" class="w3-bar-item w3-button">厚棉系列</a>
                </div>
                <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                    襯衫類 <i class="fa fa-caret-down"></i>
                </a>
                <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="./details.php?detailname=休閒襯衫" class="w3-bar-item w3-button">休閒襯衫</a>
                    <a href="./details.php?detailname=商務襯衫" class="w3-bar-item w3-button">商務襯衫</a>
                </div>
                <a href="./details.php?detailname=外套" class="w3-button w3-block w3-white w3-left-align">外套</a>
                <a onclick="myAccFunc2()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                    下身類 <i class="fa fa-caret-down"></i>
                </a>
                <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="./details.php?detailname=短褲" class="w3-bar-item w3-button">短褲</a>
                    <a href="./details.php?detailname=長褲" class="w3-bar-item w3-button">長褲</a>
                    <a href="./details.php?detailname=牛仔褲" class="w3-bar-item w3-button">牛仔褲</a>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <?php if($_SESSION['status'] == 0)echo "<a href=\"./login.php\" class=\"w3-button w3-block w3-white w3-left-align\">登入</a>";?>
                <a href="./check.php" class="w3-button w3-block w3-white w3-left-align">購物車</a>
                <?php if($_SESSION['status'] == 0)echo "<a href=\"./Register.php\" class=\"w3-button w3-block w3-white w3-left-align\">會員註冊</a>";?>
                <?php if($_SESSION['status'] == 1 && $_SESSION['type'] == 1)echo "<a href=\"./member_manage.php\" class=\"w3-button w3-block w3-white w3-left-align\">會員管理</a>";?>
                  <?php if(isset($_SESSION['id_number'])) echo "<a href='logout.php' class=\"w3-button w3-block w3-white w3-left-align\">登出</a>";?>
            </div>
            <div style="margin-top: 20px;">
                <?php if($_SESSION['status'] == 1)echo "<a href=\"./modify.php\" class=\"w3-button w3-block w3-white w3-left-align\">修改密碼</a>";?>
                <?php if($_SESSION['type'] != 1)echo "<a href=\"./message_board.php\" class=\"w3-button w3-block w3-white w3-left-align\">商品留言板</a>";?>
            </div>
        </div>
    </nav>
    

    <body>
        <div class="row" style="font-size: 9px">
            <div class="col-md-3"></div>
            <div class="col-md-8 text-center">
                 
                    <input type="hidden" name="oper" id="oper" value="insert">
                    <input type="hidden" name="stud_no_old" id="stud_no_old" value="">
                    <table id="edit" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">訂單編號</th>
                                <th class="text-center">商品</th>
                                <th class="text-center">大小</th>
                                <th class="text-center">數量</th>
                                <th class="text-center">價錢</th>
                                <th class="text-center">存檔/取消</th>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <input type="text" id="caritem_id" name="caritem_id">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="caritem_name" name="caritem_name">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="car_Size" name="car_Size">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="car_sum" name="car_sum">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="caritem_price" name="caritem_price">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-xs" id="btn-save" onclick="upda()"><i class="glyphicon glyphicon-save"></i>存檔</button>
                                    <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">訂單編號</th>
                                <th class="text-center">圖片</th>
                                <th class="text-center">商品</th>
                                <th class="text-center">大小</th>
                                <th class="text-center">數量</th>
                                <th class="text-center">價錢</th>
                                <th class="text-center">修改/取消</th>
                            </tr>
                        </thead>
                    </table>
            </div>
            <div class="col-md-2"></div>
        </div>
         <p style="padding-left: 84%"><button type="submit" class="w3-button w3-black" name="buy_btn">立即購買</button></p>
    
    </body>
    <div class="w3-black w3-center w3-padding-24" style="display: inline-block; width:100%;">
        Powered by
        <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a>
        <br>Template from
        <a href="https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm" style="word-wrap: break-word; word-break: normal" class="w3-hover-opacity" title="W3.CSS" target="_blank"> https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm</a>
    </div>

</body>
 </form>
</html>
<style>
.shopcar_table {
    width: 950px;
    border: 3px solid #DADFD9;
    border-collapse: collapse;
}

.shopcar_table tr td {
    border: 3px solid #DADFD9;
    width: 150px;
}

.shopcar_table tr td p {

    text-align: right;

}

.shopcar_table tr td img {
    width: 100%;
}
</style>
<script>
function upda() {
    if (isset($_POST['caritem_id'])) {
        <?php
    $Size = $_POST["car_Size"];
    $Num = $_POST["car_sum"];
    $id = $_POST["caritem_id"];

    $link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    // // 資料庫查詢(送出查詢的SQL指令)
    mysqli_query($link,"UPDATE item_shopcar SET car_size=\"$Size\" , car_num = \"$Num\" WHERE id =\"$id\"" );
    


    mysqli_close($link); // 關閉資料庫連結
   ?>
    }

}
</script>