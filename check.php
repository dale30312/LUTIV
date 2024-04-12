<?php 
session_start(); 


if (strcmp($_SESSION['id_number'], 'admin')==0)
     header("Location:admin_shopcar.php"); 
else if($_SESSION['id_number']!=NULL)
     header("Location:member_shopcar.php"); 
else   
{
	
	header("Location:login.php"); //若尚未登入,則導向到登入畫面)  
}
//檢查使用者權限(會員、管理者...)

?>