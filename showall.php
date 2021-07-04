<html>
<head>
	<title>ระบบบันทึกและค้นหาข้อมูล - ข้อมูลทั้งหมด</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<?php include 'includes/head.php'; ?>
</head>
<body>
<?php include 'includes/body_head.php'; ?>

<table border="0" width="100%">
	<tbody>
		<tr>
			<td align="left" bgcolor="#ff0000" class="td_title">
				<h1 style="text-align: center;"><span style="color: #ffffff;"><strong>ข้อมูลที่บันทึกทั้งหมด</strong></span></h1>
			</td>
		</tr>
	</tbody>
</table>
<table width="100%" class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center" style="background-color:#ffffff">
                <thead>
                    <tr class="table-primary" style="background-color:#cccccc">
                        <th width="6%" >ลำดับข้อมูล</th>
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
ORDER BY Update_Timestamp DESC";
$stmt = $DBH->query($sth);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
					<tr align="center">
						<td><?php echo $row['No'];?></td>
						<td><?php echo $row['Update_Timestamp'];?></td>
						<td><?php echo '<a href="show_detail.php?memo_no=' . $row['No'] .'">'.$row['Title'].'';?></a></td>
						<td><?php echo $row['Name'];?></td>
					</tr>
<?php } ?>
</table>
<br>
        <?php
			  $DBH = null;
			  include 'includes/body_foot.php';



?>

	</body>
</html>