<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = Array();
}
session_start(); 
$id = $_GET['id'];//商品ID

//若商品未在購物車中,則加入購物車(陣列)

$_SESSION['cart']=$id;//加入陣列

//返回上一頁
$url = $_SERVER['HTTP_REFERER'];
header("Location:$url");

?>