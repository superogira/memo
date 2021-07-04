<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table  width="100%" class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center">
                <thead>
                    <tr class="table-primary" style="background-color:#cccccc">
                        <th width="6%">ลำดับข้อมูล</th>
						<th width="20%">วัน/เวลา ที่บันทึก/แก้ไขล่าสุด</th>
						<th width="30%">ชื่อ,เรื่อง,หัวข้อ หรือคำอธิบาย</th>
                        <th width="22%">คำค้นหลัก</th>
                        <!-- <th width="40%">ข้อมูล</th> -->
                        <th width="22%">ผู้บันทึก/แก้ไข ล่าสุด</th>
                    </tr>
                </thead>
                <?php
				$string = $_POST['q'];
				$str_arr = explode (",", $string); 
				$count = count($str_arr);
				$i = 0;
				$r = 1;
				$str_arr_to_search="";
				while ($r <= $count) {
					$str_arr_to_search=$str_arr_to_search."Data LIKE '%$str_arr[$i]%'";
					
					if ($r == $count) {
						$str_arr_to_search=$str_arr_to_search." OR ";
					} else {
						$str_arr_to_search=$str_arr_to_search." AND ";
					};
					$i++;
					$r++;
				};
				$i = 0;
				$r = 1;
				while ($i < $count) {
					
					$str_arr_to_search=$str_arr_to_search."Name LIKE '%$str_arr[$i]%'";

					if ($r == $count) {
						$str_arr_to_search=$str_arr_to_search." OR ";
					} else {
						$str_arr_to_search=$str_arr_to_search." AND ";
					};
					$i++;
					$r++;
				};

				$i = 0;
				$r = 1;
				while ($i < $count) {
					
					$str_arr_to_search=$str_arr_to_search."Tag LIKE '%$str_arr[$i]%'";

					if ($r != $count) {
						$str_arr_to_search=$str_arr_to_search." AND ";
					};
					$i++;
					$r++;
				};

                echo '<font color="red">';   
                echo 'คำค้น = ';
                echo $_POST['q'];
                echo '</font>';
                echo '<br/>';   
				echo '<br/>';   
                $sth = "SELECT * FROM memo
					WHERE $str_arr_to_search
					ORDER BY No DESC";
					
				$stmt = $DBH->query($sth);
				//error case
				if(!$stmt)
				{
					die("Execute query error, because: ". print_r($this->pdo->errorInfo(),true) );
				}
				//success case
				else{
					//continue flow
				}
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr align="center">
                    <td><?php echo $row['No'];?></td>
					<td><?php echo $row['Update_Timestamp'];?></td>
					<td><?php echo '<a href="show_detail.php?memo_no=' . $row['No'] .'">'.$row['Title'].'';?></a></td>
                    <td><?php echo $row['Tag'];?></td>
					<td><?php echo $row['Name'];?></td>
                </tr>
            <?php } ?>
            </table>
    </div>
</div>
</div>
<br>
<?php echo "<b><u>สำหรับ debug</u></b><br>".$sth; ?>
  
