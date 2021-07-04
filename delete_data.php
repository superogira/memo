<?php
session_start();
if(isset($_POST['page_logout']))
{
 unset($_SESSION['password']);
}

if (empty($_SESSION['password'])) {
	header( "location: login.php" );
	exit(0);
};

//$datadate = $_POST["datadate"];
$memo_no = $_GET["memo_no"];

require'condb.php';
$STH = $DBH -> prepare( "DELETE FROM memo WHERE No=$memo_no");
$STH -> execute();
$DBH = null;

echo "<script>alert('ลบข้อมูลเรียบร้อย'); window.location = 'index.php';</script>";
?>