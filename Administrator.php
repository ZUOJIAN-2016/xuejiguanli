
<?php

include "Class_Administrator.php";
$action1=$_GET['button1'];
$action2=$_GET['button2'];
$string1=$_GET['sea'];
session_start();
if($_SESSION[AID]==""){
    echo "请管理员登陆后再进行操作！";
    exit;
}
if($action1)
{
    $objshow=new administrator();
    $objshow->SHOWSTU();
    $objshow->SHOWTEACHER();
}else if($action2){
    $objExcel=new administrator();
    $objExcel->Excelout();
}else if($string1){
    $objsearch=new administrator();
    $objsearch->search($string1);
}
mysqli_close($link);
?>

