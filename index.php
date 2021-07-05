<html>
<head>
	<title>ระบบบันทึกและค้นหาข้อมูล</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<?php $GLOBALS['caller_page'] = 'index'; include 'includes/head.php';?>
</head>
<body>
<?php include 'includes/body_head.php'; ?>
<table border="0" width="100%">
	<tbody>
		<tr>
			<td align="left" bgcolor="#ff0000" class="td_title">
				<h1 style="text-align: center;"><span style="color: #ffffff;"><strong>ข้อมูลที่บันทึก/แก้ไขล่าสุด</strong></span></h1>
			</td>
		</tr>
	</tbody>
</table>
<table width="100%" class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center">
                <thead>
                    <tr class="table-primary" style="background-color:#cccccc">
                        <th width="6%">ลำดับข้อมูล</th>
						<th width="22%">วัน/เวลา ที่บันทึก/แก้ไขล่าสุด</th>
						<th width="50%">ชื่อ,เรื่อง,หัวข้อ หรือคำอธิบาย</th>
                        <th width="22%">ผู้บันทึก/แก้ไข ล่าสุด</th>
                    </tr>
                </thead>
<?php
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
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

require'condb.php';
$sth = "SELECT * FROM memo
	ORDER BY Update_Timestamp DESC LIMIT 10";
$stmt = $DBH->query($sth);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	if (empty($row['Title'])) {
		$row['Title'] = "---";
	};
?>
					<tr align="center" style="background-color:#ffffff">
						<td><?php echo $row['No'];?></td>
						<td><?php echo $row['Update_Timestamp'];?></td>
						<td><?php echo '<a href="show_detail.php?memo_no=' . $row['No'] .'">'.$row['Title'].'';?></a></td>
						<td><?php echo $row['Name'];?></td>
					</tr>
<?php } ?>
</table>
<strong><a style="background-color: #ff0000; color: #ffffff;" href="./showall.php">แสดงข้อมูลที่บันทึกทั้งหมด</a></strong>
<br>

<br>
<form action="submitdata.php" method="post">
<table width="100%"  border="0">
	<tr>
		<td align="left" bgcolor="#009933" class="td_title">
				<h1 style="text-align: center;"><span style="color: #FFF;"><strong>บันทึกข้อมูล (Paste หรือ วาง รูปในกล่องข้อความได้เลย)</strong></span></h1>
		</td>
	</tr>
	<tr><td>
			<button type="submit" class="awesome_saved_button">
				<i class="fas fa-save fa-2x" ></i> บันทึกข้อมูล
			</button>
		</td></tr>
	<tr>
		<td ><b>ชื่อ,เรื่อง,หัวข้อ หรือคำอธิบายสั้น ๆ <input type="text" size="100" name="Title" placeholder="เช่น เอกสารสำคัญ เป็นต้น"></b></td>
	</tr>
	<tr>
		<td>ใส่คำค้นหลัก (Tag) แบ่งคำค้นด้วย , (comma) <input type="text" size="44" name="Tag" placeholder="เช่น เอกสาร,word,รายงาน,การประชุม เป็นต้น"> ชื่อผู้บันทึก <input type="text" size="33" name="name"></td>
	</tr>
	<tr>
		<td><textarea name="memo_data" id="editor1"></textarea></td>
	</tr>
</table>
<script>
	var editor1 = new Jodit('#editor1', {
		//buttons: [],
	});
</script>
<br>
<button type="submit" class="awesome_saved_button">
    <i class="fas fa-save fa-2x" ></i> บันทึกข้อมูล
</button>
</form>

    <?php
    //require_once('condb.php');
    $q = (isset($_POST['q']) ? $_POST['q'] : '');
    include('form.php');
    if($q!=''){
    include('show_result.php');
    };
	$DBH = null;
    ?>
	</body>
</html>
