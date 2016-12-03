<?php

include "PHPExcel.php";

class administrator
{
    function SHOWTEACHER()
    {
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link,'xueji1');
        $sql = "SELECT TID,PASSWORD,ADRESS,INTIME FROM tea";
        $results = $link->query($sql);
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo "<br>TID:" . $row["TID"], "PASSWORD:" . $row["PASSWORD"], "<br>ADRESS:" . $row["ADRESS"], "INTIME:" . $row["INTIME"];
            }
        }
    }

    function SHOWSTU()
    {
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link,'xueji1');
        $sql = "SELECT SID,PASSWORD,ADRESS,CLASS FROM stu1";
        $results = $link->query($sql);
        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo "<br>TID:" . $row["TID"], "PASSWORD:" . $row["PASSWORD"], "<br>ADRESS:" . $row["ADRESS"], "CLASS:" . $row["CLASS"];

            }
        }
    }
    function Excelout()
    {
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link,'xueji1');
        $objPHPExcel=new PHPExcel();
        for($class=1;$class<=5;$class++){
            $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex($class);
        $objsheet=$objPHPExcel->getActiveSheet();
        $sql2="SELECT SID,ADRESS,PASSWORD FROM stu1 WHERE CLASS='$class'";
        $resource=mysqli_query($link,$sql2);
            $data=mysqli_fetch_assoc($resource);
            $objsheet->setCellValue("A1","学号")->setCellValue("B1","住址");
            $i=2;
            foreach($data as $key=>$val){
                $objsheet->setCellValue("A",$i,$val['SID'])->setCellValue("B",$i,$val['ADRESS']);
            }
        }
        $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
        $objWriter->save('/xuejiguanli'."/export");
    }//导出excel文件
    function search($string1){

        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link,'xueji1');
        $sql = "SELECT SID, ADRESS, 
               PASSWORD, CLASS
        FROM stu1
        WHERE runoob_author LIKE %'$string1'%";
        $result=mysqli_query($link,$sql);
        while($row = mysqli_fetch_array($result)){
            echo $row['SID'].$row['ADRESS'].$row['CLASS'];

        }


    }
}