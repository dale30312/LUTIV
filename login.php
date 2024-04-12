<?php
session_start();
if($_SESSION['status']==1)
{
    header("Location:index.php");
    
}


$link = mysqli_connect("localhost", "root", "root123456", "group_14") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

mysqli_close($link); // 關閉資料庫連結
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
    <script src="JS/demoacc.js"></script>
    <script src="JS/form.js"></script>
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
                <a href="./login.php" class="w3-button w3-block w3-white w3-left-align">登入</a>
                <a href="./check.php" class="w3-button w3-block w3-white w3-left-align">購物車</a>
                <a href="./Register.php" class="w3-button w3-block w3-white w3-left-align">會員註冊</a>
                <a href="./forget.php" class="w3-button w3-block w3-white w3-left-align">忘記密碼</a>
                <?php if($_SESSION['type'] != 1)echo "<a href=\"./message_board.php\" class=\"w3-button w3-block w3-white w3-left-align\">商品留言板</a>";?>
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
        <div class="w3-hide-large" style="margin-top:83px"></div>
        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <p class="w3-left">登入</p>
            <p class="w3-right">
                <a href="./check.php"><i class="fa fa-shopping-cart w3-margin-right"></i><span id="cart_cnt" class="badge alert-danger">
                        <?php echo $_SESSION['cart']; ?></span></a>
                <!--購物車按鈕-->
            </p>
        </header>
        <div class="w3-container  w3-text-white" style="border: 1px solid; background-color: black;">
            <p align="center"></p>
        </div>
        <!-- Image header -->
        <div class="w3-display-container w3-container" style="border: #64F4AA 1px solid;">
            <form name="form1" action="" method="POST" id="form1">
                <table align="center" style="padding: 20px;">
                    <tr>
                        <td>
                            帳號 : <input type="text" name="id_number" style="font-size:15px" placeholder="*請輸入帳號名" maxlength="10" required onkeyup="sendRequest()">
                        </td>
                        <td>
                            <label class="error" for="id_number"></label>
                        </td>
                    </tr>　　
                    　 <tr>
                        <td>
                            密碼 : <input type="password" name="pw" style="font-size:15px" placeholder="*請輸入密碼(6~12字元)" maxlength="12" minlength="6" required onkeyup="sendRequest()">
                        </td>
                        <td>
                            <label class="error" for="pw"></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" align="center">
                            <br><button type="button" style="font-size: 15px" onclick="check()">確認送出</button>
                        </td>
                    </tr>
                </table>
                　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
            </form>
            <center>訊息：<span id='show_msg' style="color:red"></span></center>
        </div>
        <!-- Footer -->
        <div class="w3-center w3-padding-24" style="display: inline-block; width:100%;">
            Powered by
            <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a>
            <br>Template from
            <a href="https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm" style="word-wrap: break-word; word-break: normal" class="w3-hover-opacity" title="W3.CSS" target="_blank"> https://www.w3schools.com/w3css/tryw3css_templates_clothing_store.htm</a>
        </div>
        <!-- End page content -->
    </div>
</body>

</html>
<script>
function sendRequest() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == '1') {
                document.getElementById('show_msg').innerHTML = '正確';
                $status = 1;
            } else {
                document.getElementById('show_msg').innerHTML = '帳號或密碼錯誤';
                $status = 0;
            }

        }
    };

    var url = 'check_login.php?id_number=' + document.form1.id_number.value + '&pw=' + document.form1.pw.value + '&timeStamp=' + new Date().getTime();
    xhttp.open('GET', url, true); //建立XMLHttpRequest連線要求
    xhttp.send();

}
</script>
<script>
function check() {

    if ($status == 0) {
        alert('登入失敗，請檢查帳號或密碼是否正確');

        //echo "<meta http-equiv=\"refresh\" content=\"0;url=./iogin.php\">"    
    } else {

        alert('登入成功');
        window.location = './index.php';
        //echo "<meta http-equiv=\"refresh\" content=\"0;url=./iogin.php\">"
    }
}
</script>