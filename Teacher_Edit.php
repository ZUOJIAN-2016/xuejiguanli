


<html>
<head><meta charset="utf-8"></head>
<form action="teaedit.php" method="post">输入你的ID:<input type="text" name="CID">
    修改您的密码：<input type="password"name="cpword"/><br>
修改您的地址：<input type="text"name="cadres" >
修改你的入职时间：<input type="date"name="cintime">

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
    $sql1 = "update tea set PASSWORD='.$cpword'WHERE TID='$_CID'";
    mysqli_query($link, $sql1);
}else if($cadres){
    $sql2= "update tea set ADRESS='.$cadres'WHERE TID='$_CID'";
    mysqli_query($link,$sql2);
}
$results=mysqli_affected_rows();
if($results>0){
    echo "修改成功";
}else{
    echo "failed!";
}
?>