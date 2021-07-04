<html>
<head>
	<title>แก้ไขข้อมูล</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<?php include 'includes/head.php'; ?>
</head>
<body>
<?php
$memo_no = $_GET["memo_no"];
include 'includes/body_head.php';

session_start();
if(isset($_POST['page_logout']))
{
 session_unset();
 session_destroy();
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    // last request was more than 60 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}

if (empty($_SESSION['password'])) {
	header( "location: login.php" );
	exit(0);
};

require'condb.php';

$sth = "SELECT * FROM memo
WHERE No='$memo_no'";
$stmt = $DBH->query($sth);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$data = $row['Data'];
?>
<form action="save_data.php?memo_no=<?= $memo_no ?>" method="post">
<table width="100%"  border="0">
	<tr>
		<td align="left" bgcolor="#009933">
				<h1 style="text-align: center;"><span style="color: #FFF;"><strong>แก้ไขข้อมูล (Paste หรือ วาง รูปในกล่องข้อความได้เลย)</strong></span></h1>
		</td>
	</tr>
	<tr><td><button type="submit" class="awesome_saved_button">
				<i class="fas fa-save fa-2x" ></i> บันทึกข้อมูล
			</button>
		</td>
	</tr>
	<tr>
		<td><b>ชื่อ,เรื่อง,หัวข้อ หรือคำอธิบายสั้น ๆ <input type="text" size="100" name="Title" placeholder="เช่น เอกสารสำคัญ เป็นต้น" value="<?= $row['Title']; ?>"></b></td>
	</tr>
	<tr>
		<td>ใส่คำค้นหลัก (Tag) แบ่งคำค้นด้วย , (comma) <input type="text" size="44" name="Tag" placeholder="เช่น เอกสาร,word,รายงาน,การประชุม เป็นต้น" value="<?= $row['Tag']; ?>"> ชื่อผู้บันทึก <input type="text" size="33" name="name" value="<?= $row['Name']; ?>"></td>
	</tr>
	<tr>
		<td><textarea name="memo_data" id="editor1" ><?= $data ?></textarea></td>
	</tr>
</table>
<br>
<button type="submit" class="awesome_saved_button">
	<i class="fas fa-save fa-2x" ></i> บันทึกข้อมูล
</button>
</form>
<?php 
	$DBH = null;
	include 'includes/body_foot.php';
?>
<script>
	var editor1 = new Jodit('#editor1', {
		//buttons: [],
	});
</script>

	</body>
</html>
