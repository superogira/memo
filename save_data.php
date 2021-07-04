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
$memo_no = $_GET["memo_no"];

$memo_data = $_POST["memo_data"];
$name = $_POST["name"];
$tag = $_POST["Tag"];
$title = $_POST["Title"];

require'condb.php';

$sth = "UPDATE memo SET Title=?, Data=?, Tag=?, Name=?, Update_Timestamp=CURRENT_TIMESTAMP WHERE No=?";
$stmt= $DBH->prepare($sth);
$stmt->execute([$title, $memo_data, $tag, $name, $memo_no]);
$DBH = null;

echo "<script>alert('บันทึกข้อมูลที่แก้ไขเรียบร้อย'); window.location = 'show_detail.php?memo_no=$memo_no';</script>";

?>