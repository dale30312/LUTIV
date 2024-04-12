<?php 
session_start(); 
if (isset($_POST['id_number']) && isset($_POST['pw']) )
  $_SESSION['id_number'] = $_POST['id_number'] ;
?> 
<?php

    $link = mysqli_connect("localhost", "root", "root123456", "group_14") or die("無法開啟MySQL資料庫連結!<br>");
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
   

    $result = mysqli_query($link,"SELECT COUNT(*) as 'count' from item_shopcar where member = '" . $_SESSION['id_number'] . "'");
    $numsun = mysqli_fetch_assoc($result);
    $cnt = $numsun['count'];
    $_SESSION['cart'] = $cnt;
    mysqli_free_result($result); // 釋放佔用的記憶體
   
    $i=0;
    
    if ($result = mysqli_query($link, "SELECT * from item_basis having saleout > 1 order by saleout DESC"))
    {
        while ($row = mysqli_fetch_assoc($result) ) {
            if($i<10)
            {
            $data .= "<div style='float: left; margin:5px;'><a href='shopweb_item.php?Detail_item=$row[item_id]' title='$row[item_name]'><img src='$row[item_img]' alt='$row[item_name]'></a><br><p align='center'>$row[item_name]<br>$row[item_price]</p></div>";
            }
            $i++;
        }
    mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
?>

<!DOCTYPE html>
<html>

<head>
    <title>熱銷商品</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./CSS/details.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="JS/demoacc.js"></script>
</head>

<body class="w3-content" style="max-width:1200px;">
    <!-- Sidebar/menu -->
   <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b>LUTIV</b></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="./index.php" class="w3-button w3-block w3-white w3-left-align">首頁</a>
            <a class="w3-button w3-block w3-left-align">熱銷商品</a>
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
        <div class="w3-bar-item w3-padding-24 w3-wide">LUTIV</div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px;">
        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px;"></div>
        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <p class="w3-left" style="font-weight:bold;">熱銷商品</p>
            <p class="w3-right">
                 <span style="color: blue ; font-size: 15px">歡迎! <?php if($_SESSION['status'] == 1) echo $_SESSION['id_number'];?></span>
                <a href="./check.php"><i class="fa fa-shopping-cart w3-margin-right"></i><span id="cart_cnt" class="badge alert-danger"><?php echo $_SESSION['cart']; ?></span></a>
                <!--購物車按鈕-->
                <?php if($_SESSION['status'] == 1) echo "<a href='logout.php'><span style=\"color:blue ; font-size:15px\" >登出</span></a>";?>
            </p>
        </header>
        
        <?php echo $data;?>

        <!-- Footer -->
        <div class="w3-black w3-center w3-padding-24" style="display: inline-block; width:100%;">
            Powered by
            <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a>
            <br>Template from
            <a href="https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm" style="word-wrap: break-word; word-break: normal" class="w3-hover-opacity" title="W3.CSS" target="_blank"> https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm</a>
        </div>
        <!-- End page content -->
    </div>
</body>

</html>