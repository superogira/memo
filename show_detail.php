<html>
<head>
	<title>แสดงข้อมูล</title>
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
?>
<script>
	function deleteConfirm() {
		//confirm("ต้องการลบข้อมูลหรือไม่?");
		if (window.confirm('ต้องการลบข้อมูลหรือไม่?'))
		{
			// They clicked Yes
			document.location = 'delete_data.php?memo_no=<?=$memo_no?>'
		} else {
			// They clicked no
		}
	}
	</script>
<table width="100%" class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center" style="background-color:#ffffff">
                <thead>
                    <tr class="table-primary" style="background-color:#cccccc">
                        <th width="7%"><h3>ลำดับข้อมูล</h3></th>
						<th width="12%"><h3>วัน/เวลา ที่บันทึก</h3></th>
						<th width="12%"><h3>วัน/เวลา แก้ไข ล่าสุด</h3></th>
						<th width="30%"><h3>ชื่อ,เรื่อง,หัวข้อ หรือคำอธิบาย</h3></th>
                        <th width="20%"><h3>คำค้นหลัก</h3></th>
                        <th width="19%"><h3>ผู้บันทึก/แก้ไข ล่าสุด</h3></th>
                    </tr>
                </thead>

<?php
require'condb.php';
	
$sth = "SELECT * FROM memo
WHERE No='$memo_no'";
	
$stmt = $DBH->query($sth);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
                <tr align="center">
                    <td><?php echo $row['No'];?></td>
					<td><?php echo $row['Timestamp'];?></td>
					<td><?php echo $row['Update_Timestamp'];?></td>
					<td><?php echo $row['Title'];?></td>
                    
                    <td><?php echo $row['Tag'];?></td>
					<td><?php echo $row['Name'];?></td>
                </tr>
			</table><br>
			<table width="100%" border="1" cellpadding="5"  cellspacing="3" align="center" style="background-color:#ffffff">
				<tr style="background-color:#cccccc">
					<th><h3>ข้อมูล</h3></th>
				</tr>
				<tr>
					<td><?php echo $row['Data'];?></td>
				</tr>
			</table>
			<?php } ?>
        <br>
        <?php 
			$DBH = null;
			include 'includes/body_foot.php';
		?>
	</body>
</html>