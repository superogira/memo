<table style="width: 100%; border-collapse: collapse;" border="0">
	<tbody>
		<tr>
<?php
		if(strpos($page, 'showall')!== false || strpos($page, 'show_detail')!== false) {
	echo '
			<td align="center">
				<!-- <h2 style="text-align: center;"><a href="index.php"><span style="background-color: #008000; color: #ffffff;">ย้อนกลับ</span></a></h2> -->
				<form>				
					<button type="submit" class="awesome_back_button" formaction="index.php">
						<i class="fas fa-arrow-circle-left fa-2x"></i> กลับไปหน้าหลัก
					</button>
				</form>
			</td>
	';};
		if(strpos($page, 'show_detail')!== false) {
	echo '
			<td align="center">
				<form method="get">
					<input type="hidden" name="memo_no" value="'.$memo_no.'">
					<button type="submit" method="get" class="awesome_edit_button" formaction="edit.php">
						<i class="fas fa-edit fa-2x"></i> แก้ไข
					</button>
				</form>
			</td>
			<td align="center">
				<form>
					<button type="button" class="awesome_delete_button" onclick="deleteConfirm()">
						<i class="fas fa-trash-alt fa-2x"></i> ลบข้อมูล
					</button>
				</form>	
			</td>
	';};
		if(strpos($page, 'edit')!== false) {
	echo '
			<td align="center">
				<form method="get">
					<input type="hidden" name="memo_no" value="'.$memo_no.'">
					<button type="submit" class="awesome_back_button" formaction="show_detail.php">
						<i class="fas fa-arrow-circle-left fa-2x"></i> กลับไปหน้าที่แล้ว
					</button>
				</form>
			</td>
	';};
?>
		</tr>
	</tbody>
</table>
