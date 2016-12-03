

<?php
session_start();
$_ID=$_POST['ID'];
$_PASSWORD=MD5($_POST['pwd']);
$link=mysqli_connect("localhost:3306","root","");
$link2=mysqli_select_db($link,'xueji1');

$sql="SELECT SID,PASSWORD FROM stu1 WHERE SID='$_ID',PASSWORD '$_PASSWORD'";
$sql1="SELECT TID,PASSWORD FROM tea WHERE SID='$_ID',PASSWORD '$_PASSWORD'";
$sql3="SELECT AID,PASSWORD FROM admin_list1 WHERE SID='$_ID',PASSWORD '$_PASSWORD'";//匹配身份信息
$result=mysqli_query($link,$sql);
$result1=mysqli_query($link,$sql1);
$result2=mysqli_query($link,$sql3);//匹配登录信息

if($result){
    $_SESSION['SID']=$sql->fields['SID'];
    $_SESSION['PASSWORD']=$sql->fields['PASSWORD'];
    header('http://localhost:63342/htdocs/xuejiguanli/Student_Page.php?SID=$_SESSION[SID]');//跳转至学生桌面
}else if($result1)
{
    $_SESSION['TID']=$sql1->fields['TID'];
    $_SESSION['PASSWORD']=$sql1->fields['PASSWORD'];
    header('http://localhost:63342/htdocs/xuejiguanli/Teacher_Page.php?TID=$_SESSION[TID]');//跳转至老师桌面
}else if($result2){
    $_SESSION['AID']=$sql3->fields['AID'];
    $_SESSION['APASSWORD']=$sql3->fields['APASSWORD'];
    header('http://localhost:63342/htdocs/xuejiguanli/administrator.html?AID=$_SESSION[AID]');}
else{
    echo "登录失败！";
}

?>
