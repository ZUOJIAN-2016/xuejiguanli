
<?php

$link=mysqli_connect("localhost:3306","root","");
if(!$link)
{
    die('failed');
}else{
    echo "连接成功";
}
$_CLASS=$_POST['class'];
mysqli_select_db($link,'xueji1');
$result=mysqli_query('SELECT SID,ADRESS FROM stu1 WHERE CLASS="$_CLASS"');
while($row = mysqli_fetch_array($result)) {
    echo $row['SID'] . $row['ADRESS'] . $row['CLASS'];
}
mysqli_close($link)
?>

