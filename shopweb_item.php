<?php 
session_start(); 

$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    if (isset($_SESSION['cart'])) {
        $result = mysqli_query($link,"SELECT COUNT(*) as 'count' from item_shopcar where member = '" . $_SESSION['id_number'] . "'");
        $numsun = mysqli_fetch_assoc($result);
        $cnt = $numsun['count'];
        $_SESSION['cart'] = $cnt;
        mysqli_free_result($result); // 釋放佔用的記憶體
    }

    if (isset($_POST['car_btn'])) 
    {
        if(!empty($_POST['item_size']))
        {
            if($_SESSION['id_number']!=NULL)
            {
                $sql = "insert into item_shopcar (member, car_item,car_size, car_num) values ('" . $_SESSION['id_number'] . "','" . $_GET["Detail_item"] . "','" . $_POST['item_size'] . "','" . $_POST['number'] . "')";

                $result = mysqli_query($link, $sql);
                header("Location:cart.php?id=1"); 
                echo "<script language=\"JavaScript\">alert(\"新增成功\");</script>";
            }
            else
            {
                echo "<script language=\"JavaScript\">alert(\"新增失敗\");</script>";
                header("Location:login.php"); //若尚未登入,則導向到登入畫面)  
            }
        }
        else
        {
            echo "<script language=\"JavaScript\">alert(\"新增失敗 : 請選擇尺寸\");</script>";
        }
    }

// // 資料庫查詢(送出查詢的SQL指令)
if ($result = mysqli_query($link, "SELECT * FROM item_basis")) {
    while ($item = mysqli_fetch_assoc($result)) {
         if ($item["item_id"] == $_GET["Detail_item"]) {
            $items_type .= $item["item_type"];
            $items_img .= $item["item_img"];
            $items_img_1 .= $item["item_img_1"];
            $items_img_2 .= $item["item_img_2"];
            $items_name .= $item["item_name"];
            $items_price .= $item["item_price"];
            $items_cart_id .= $item["item_cart_id"];
            $_SESSION['item_id'] = $item["item_id"];
            $_SESSION['item_type'] = $item["item_type"];
            $_SESSION['item_img'] = $item["item_img"];
            $_SESSION['item_name'] = $item["item_name"];
            $_SESSION['item_price'] = $item["item_price"];
         }
    }

    mysqli_free_result($result); // 釋放佔用的記憶體
}
if ($result = mysqli_query($link, "SELECT * FROM item_element")) {
    while ($element = mysqli_fetch_assoc($result)) {
        $elements_source .= $element["source"];
        $elements_material .= $element["material"];
    }

    mysqli_free_result($result); // 釋放佔用的記憶體
}
if ($result = mysqli_query($link, "SELECT * FROM item_sizeform")) {
    while ($sizetable = mysqli_fetch_assoc($result)) {
        $sizetables .= "<tr><td>" .$sizetable["size"] . "</td><td>".$sizetable["shoulder"] . "</td><td>" . $sizetable["chest"] . "</td><td>" . $sizetable["sleeve"]. "</td><td>" . $sizetable["length"]. "</td></tr>";
        
    }

    mysqli_free_result($result); // 釋放佔用的記憶體
}
if ($result = mysqli_query($link, "SELECT * FROM item_model_report")) {
    while ($model_report = mysqli_fetch_assoc($result)) {
        $model_reports .= "<tr><td>" .$model_report["model"] . "</td><td>".$model_report["height"] . "</td><td>" . $model_report["weight"] . "</td><td>" . $model_report["shoulder"]. "</td><td>". $model_report["chest"]. "</td><td>" . $model_report["model_size"]. "</td></tr>";
        
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>


<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./CSS/item.css">
<link rel="stylesheet" href="./CSS/details.css">
<link rel="stylesheet" href="./CSS/shopweb_item.css">
<script src="JS/item.js"></script>
<script src="JS/demoacc.js"></script>

<body class="w3-content" style="max-width:1200px">
    <form action="" method="POST">
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
                    <?php if($_SESSION['status'] == 0)echo "<a href=\"./forget.php\" class=\"w3-button w3-block w3-white w3-left-align\">忘記密碼</a>";?>
                </div>
                <div style="margin-top: 20px;">
                    <?php if($_SESSION['status'] == 1)echo "<a href=\"./modify.php\" class=\"w3-button w3-block w3-white w3-left-align\">修改密碼</a>";?>
                    <?php if($_SESSION['type'] != 1)echo "<a href=\"./message_board.php\" class=\"w3-button w3-block w3-white w3-left-align\">商品留言板</a>";?>
                    <?php if($_SESSION['type'] == 1)echo "<a href=\"./message_board_admin.php\" class=\"w3-button w3-block w3-white w3-left-align\">商品留言板</a>";?>
                </div>
            </div>
        </nav>
        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">
            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>
            <!-- Top header -->
            <header class="w3-container w3-xlarge">
                <p class="w3-left" style="font-weight:bold;">
                    <?php echo $items_type; ?>
                </p>
                <p class="w3-right">
                    <a href="./check.php"><i class="fa fa-shopping-cart w3-margin-right"></i><span id="cart_cnt" class="badge alert-danger">
                            <?php echo $_SESSION['cart']; ?></span></span></a>
                    <!--購物車按鈕-->
                    <?php if(isset($_SESSION['id_number'])) echo "<a href='logout.php'><span style=\"color:blue ; font-size:15px\" >登出</span></a>";?>
                </p>
            </header>
            <!-- Image header -->
            <div class="w3-display-container w3-container">
                <div id="item_img_area" class="carousel slide" data-ride="carousel" style="width: 50%">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#item_img_area" data-slide-to="0" class="active"></li>
                        <li data-target="#item_img_area" data-slide-to="1"></li>
                        <li data-target="#item_img_area" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img style="width: 100% ; height: 500px;" src=<?php echo "\""; echo $items_img; echo " \""; ?>>
                        </div>
                        <div class="item">
                            <img style="width: 100% ; height: 500px;" src=<?php echo "\""; echo $items_img_1; echo " \""; ?>>
                        </div>
                        <div class="item">
                            <img style="width: 100% ; height: 500px;" src=<?php echo "\""; echo $items_img_2; echo " \""; ?>>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#item_img_area" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#item_img_area" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br><br>
                <table class="item_name_table" style="line-height: 0;">
                    <tr>
                        <td>
                            <p style=" color: gray;" align="left">
                                <?php echo $items_name; ?>
                            </p>
                        </td>
                        <td align="right">
                            <p style=" color: gray;"><b style="color: red;">
                                <?php echo $items_price; ?></b></p>
                        </td>
                    </tr>
                </table>
                <div>
                    <body>
                        <h4>SIZE</h4>
                        <div class="size_of_item">
                            <input type="radio" id="size_S" name="item_size" value="S">
                            <label for="size_S">S</label>
                            <input type="radio" id="size_M" name="item_size" value="M">
                            <label for="size_M">M</label>
                            <input type="radio" id="size_L" name="item_size" value="L">
                            <label for="size_L">L</label>
                            <input type="radio" id="size_XL" name="item_size" value="XL">
                            <label for="size_XL">XL</label>
                            <input type="radio" id="size_XXL" name="item_size" value="XXL">
                            <label for="size_XXL">XXL</label>
                            <div class="num_of_item ">
                                請選擇數量
                                <select name="number" size="1">
                                    <?php
                                        for($i=1;$i<=20;$i++)
                                        {
                                            if($i==$_POST['number'])
                                                echo "<option value=\"$i\" selected>$i</option>";
                                            else 
                                                echo "<option value=\"$i\">$i</option>";
                                        }
                                    ?>
                                </select>件
                            </div>
                        </div>
                    </body>
                </div>
                <p align="right"><button type="submit" class="w3-button w3-black" name="car_btn" id=<?php echo "\""; echo $items_cart_id; echo " \""; ?>>加入購物車<i class="fa fa-shopping-cart"></i></button></p>
            </div>
            <div class="item_introduce">
                <div style="background-color: #CAC0C0;">
                    <h1 style="font-size: 40px; "> <i style="color: #5D5454">關於商品 </i></h1>
                    <input type="radio" id="radio_element" name="radio_introduce" checked onclick="show_area_element()">
                    <label for="radio_element">產品說明</label>
                    <input type="radio" id="radio_size" name="radio_introduce" onclick="show_area_sizeform()">
                    <label for="radio_size">尺寸表</label>
                    <input type="radio" id="radio_model" name="radio_introduce" onclick="show_area_model()">
                    <label for="radio_model">試穿報告</label>
                    <br>
                </div>
                <table class="table_element_class" id="table_element_id" style=" color: #757373">
                    <tr align="left">
                        <th width="80">產地 : </th>
                        <td>
                            <?php echo $elements_source; ?>
                        </td>
                    </tr>
                    <tr align="left">
                        <th width="80">材質 : </th>
                        <td>
                            <?php echo $elements_material; ?>
                        </td>
                    </tr>
                    <?php echo $elements;?>
                    <br>
                    <tr>
                        <td colspan="5">_________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>注意事項及洗滌方式</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>＊因拍攝燈光效果可能造成與實品色差，請以商品圖顏色為準。<br>
                                1.深淺色請分開洗滌。<br>
                                2.請放入細網洗衣袋中弱速水洗，以保持商品型態。<br>
                                3.洗滌時，水溫請低於30℃；請使用中性洗劑；請勿長時間浸泡。<br>
                                4.請勿使用漂白劑、螢光增白劑及衣物柔軟劑，以免破壞布料。<br>
                                5.不可濕放，以免衣物染色；請弱速輕脫水，不可烘乾，以免衣物縮水。<br>
                                6.如需整燙，請以低溫墊布熨燙。</p>
                        </td>
                    </tr>
                </table>      
            </div>
            <div class="sizeform_class" id="sizeform_id">
                    <table class="table_sizeform_class" id="table_sizeform_id" border="1px">
                        <tr style="font-size: 25px; font-weight:bold; background-color: #BED1F9">
                            <td>尺碼</td>
                            <td>肩寬</td>
                            <td>胸寬</td>
                            <td>袖長</td>
                            <td>衣長</td>
                        </tr>
                        <?php echo $sizetables; ?>
                    </table>
                    <p style="font-size: 15px ; color: #838080">
                        ※ 本尺寸表會因商品素材不同，可能與實際尺寸略有誤差。<br>
                        ※ 尺寸皆以公分(cm)為單位。
                    </p>
                 <!--   <img src="./images/sizeform_img01.gif" alt="" style="width:100%"> -->
                </div>
            <div class="model_class" id="model_id">
                <table class="table_model_class" id="table_model_id" border="1px">
                    <tr style="font-size: 25px; font-weight:bold; background-color: #BED1F9">
                        <td>試穿人員</td>
                        <td>身高(cm)</td>
                        <td>體重(kg)</td>
                        <td>肩寬</td>
                        <td>胸圍</td>
                        <td>適合尺碼</td>
                    </tr>
                    <?php echo $model_reports; ?>
                </table>
                <p style="font-size: 15px ; color: #838080">
                    ※ 身高體重與尺寸沒有絕對的關係，165cm壯碩與180cm瘦高的男生也許會穿同一個尺寸。<br>
                    ※ 胸圍是影響尺寸選擇的關鍵因素，建議您可以參考試穿人員的胸圍做選擇。<br>
                    ※ 若您屬於肩膀較寬的體型，建議您參考胸圍後再對照肩寬數據。</p>
            </div>
            <div class="w3-display-container w3-container" style="border: #64F4AA 1px solid;">
                <span id='show_msg' style="color:red ; font-size: 30px">給點評價吧：</span>
                <form name="form1" action="" method="POST" id="form1">
                    <table border="1" width="80%" id="table1">
                        <tr>
                            <td width="200" align="center">留言內容</td>
                            <td align="left"><textarea name='content' rows='10' cols='50'></textarea></td>
                        </tr>
                        <tr>
                            <td colspan='2' align="center">
                                <button type="submit" style="font-size: 25px">送出</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- Footer -->
            <div class="w3-black w3-center w3-padding-24" style="display: inline-block; width:100%;">
                Powered by
                <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a>
                <br>Template from
                <a href="https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm" style="word-wrap: break-word; word-break: normal" class="w3-hover-opacity" title="W3.CSS" target="_blank"> https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm</a>
            </div>
            <!-- End page content -->
        </div>
    </form>
</body>

</html>
<?php
session_start();
$content = $_POST['content'];
$item_id = $_SESSION['item_id'];
$item_type = $_SESSION['item_type'];
$item_img = $_SESSION['item_img'];
$item_name = $_SESSION['item_name'];
$item_price = $_SESSION['item_price'];
if($_SESSION['status'] == 0)
    $user = '訪客';
else    
    $user = $_SESSION['id_number'];
$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
        or die("無法開啟MySQL資料庫連結!<br>");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if($content!=NULL)
{
$sql = "insert into board  (item_id, item_type, item_img, item_name, item_price,account,content) values ('" . $item_id . "','" . $item_type . "','" . $item_img. "','" .  $item_name . "','" . $item_price . "','" . $user.  "','" . $content . "')";

$result = mysqli_query($link, $sql);
 }
 mysqli_close($link); // 關閉資料庫連結  
?>
<style >
    @media screen and (max-width: 1500px) {
    .item_name_table {
        width: 100%;
        font-size: 40px;
    }

    .size_of_item input[type="radio"]+label {
        width: 50px;
        height: 30px;
        font-size: 18px;
    }

    .table_model_class {
        width: 100%;
        font-size: 30px;
    }
    .table_sizeform_class {
        width: 100%;
        font-size: 30px;
    }

    .table_element_class {
        font-size: 20px
    }

    .item_introduce input[type="radio"]+label {
        width: 150px;
        height: 40px;
        font-size: 20px;
    }

    .num_of_item {
        font-size: 22px;
    }

    .table_sizeform_class {
        width: 100%;
        font-size: 30px;
    }
}

@media screen and (max-width: 768px) {
    .item_name_table {
        width: 100%;
        font-size: 25px;
    }

    .size_of_item input[type="radio"]+label {
        width: 40px;
        height: 36px;
        font-size: 20px;
    }

    .table_model_class {
        width: 70%;
        font-size: 30px;
    }
    .table_sizeform_class{
        width: 50%;
        font-size: 30px;
    }

    .table_element_class {
        font-size: 15px
    }

    .item_introduce input[type="radio"]+label {
        width: 120px;
        height: 30px;
        font-size: 15px;
    }

    .num_of_item {
        font-size: 21px;
    }

    .table_sizeform_class {
        width: 70%;
        font-size: 25px;
    }
}

@media screen and (max-width: 500px) {
    .item_name_table {
        width: 100%;
        font-size: 15px;
    }

    .size_of_item input[type="radio"]+label {
        width: 40px;
        height: 35px;
        font-size: 18px;
    }

    .table_model_class {
        width: 50%;
        font-size: 30px;
    }
    .table_sizeform_class {
        width: 50%;
        font-size: 30px;
    }

    .table_element_class {
        font-size: 10px
    }

    .item_introduce input[type="radio"]+label {
        width: 110px;
        height: 25px;
        font-size: 10px;
    }

    .num_of_item {
        font-size: 19px;
    }

    .table_sizeform_class {
        width: 50%;
        font-size: 20px;
    }
}
</style>