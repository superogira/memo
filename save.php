<?php
$memo_data = $_POST["memo_data"];
$name = $_POST["name"];
$tag = $_POST["Tag"];
$title = $_POST["Title"];

require'condb.php';

$STH = $DBH -> prepare( "UPDATE INTO `memo` (`Data`,`Name`,`Tag`,`Title`) 
VALUES ('$memo_data','$name','$tag','$title')");

$STH -> execute();
$DBH = null;
	
echo "<script>alert('บันทึกข้อมูลที่แก้ไขเรียบร้อย'); window.location = 'index.php';</script>";
?>