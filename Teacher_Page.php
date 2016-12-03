<html>
<head><meta charset="UTF-8"></head>
<body><p>这是您的个人信息</p>
<a href="Teacher_Edit.php">点击此处修改您的个人信息</a>
<form action="View_You_Class.php" method="post">您的班级是<input type="number"name="class"></form>
<a href="View_You_Class.php">点击此处看你的班级信息</a>




<?php
$_ID=$_POST['ID'];
$link=mysqli_connect("localhost:3306","root","");
if(!$link)
{
    die('failed');
}else{
    echo "连接成功";
}

    $SQL="SELECT FROM tea WHERE TID='$_ID'";
$results=mysqli_query($link,$SQL);
while($row=mysqli_fetch_array($results)){
    echo "您的ID:".$row['TID']."地址:".$row['ADRESS']."<br>入职时间".$row['INTIME']."密码：".$row['PASSWORD'];
}//显示老师的个人信息
mysqli_close($link);
?>
</body>
</html>
