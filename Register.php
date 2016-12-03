
<?php

$link=mysqli_connect("localhost:3306","root","");
if(!$link)
{
    die('failed');
}else{
    echo "连接成功";
}

mysqli_select_db($link,'xueji1');
$_ID=$_POST['ID'];
$_OCUPATION=$_POST['occ'];
$_TRUENAME=$_POST['TRUENAME'];
$_CLASS=$_POST['CLASS'];
$_PASSWORD=$_POST['PSW'];
$_ADRESS=$_POST['ADS'];
$_INTIME=$_POST['IT'];
//密码验证

$n = preg_match_all("/^[a-zA-Z\d_]{8,20}$/",$_PASSWORD,$array);
//长度是8到20

if($_OCCUPATION='老师')
{
    $sql="INSERT INTO tea (TID, PASSWORD, ADRESS, INTIME) VALUES('$_ID','$_PASSWORD','_$ADRESS','$_INTIME') ";
    $res1=mysqli_query($link,$sql);
}else if($_OCCUPATION='学生')
{
    $sql1="INSERT INTO stu1(SID,PASSWORD,CLASS,ADRESS)VALUES('$_ID','$_PASSWORD','$_CLASS','$_ADRESS')";
    $res2=mysqli_query($link,$sql1);
}else if(!$n){
    echo "密码不合规格！";
}
if($sql||$sql1)
{
    echo "注册成功";
}else{
    echo "注册失败！";
}

mysqli_close($link);?>
