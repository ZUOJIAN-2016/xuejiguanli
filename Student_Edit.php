
<html>
<head><meta charset="utf-8"></head>
<form action="Student_Edit.php" method="post">输入你的ID:<input type="text" name="CID">
    修改您的密码：<input type="password"name="cpword"/><br>
修改您的地址：<input type="text"name="cadres" >

<?php
$link=mysqli_connect("localhost:3306","root","");
mysqli_select_db($link,'xueji1');

//修改信息
$_CID=$_POST['CID'];
$SQL="SEARCH TID FROM tea WHERE TID='$_CID";
$result=mysqli_query($link,$SQL);
$cpword=$_POST['cpword'];
$cadres=$_POST['cintime'];
if($cpword) {
    $sql1 = "update stu1 set PASSWORD='.$cpword'WHERE SID='$_CID'";
    mysqli_query($link, $sql1);
}else if($cadres){
    $sql2= "update stu1 set ADRESS='.$cadres'WHERE SID='$_CID'";
    mysqli_query($link,$sql2);
}
$results=mysqli_affected_rows();
if($results>0){
    echo "修改成功";
}else{
    echo "failed!";
}//修改学生个人信息
?>