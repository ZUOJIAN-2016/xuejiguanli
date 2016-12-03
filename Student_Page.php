<html>
<head><meta charset="UTF-8"></head>
<body><p>这是您的个人信息</p>
<a href="stuedit.php">点击此处修改您的个人信息</a>





<?php
$_ID=$_POST['ID'];
$link=mysqli_connect("localhost:3306","root","");
if(!$link)
{
    die('failed');
}else{
    echo "连接成功";
}

$SQL="SELECT FROM stu1 WHERE SID='$_ID'";
$results=mysqli_query($link,$SQL);
while($row=mysqli_fetch_array($results)){
    echo "您的ID:".$row['SID']."地址:".$row['ADRESS']."<br>班级".$row['class']."密码：".$row['PASSWORD'];
}//显示学生个人信息
?>
</body>
</html>