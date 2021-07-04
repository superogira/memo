<?php
session_start();

if(isset($_POST['submit_pass']) && $_POST['pass'])
{
 $pass=$_POST['pass'];
 if($pass=="123456")
 {
  $_SESSION['password']=$pass;
 }
 else
 {
  $error="รหัสผ่าน ผิดพลาด";
 }
}

if(isset($_POST['page_logout']))
{
 unset($_SESSION['password']);
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="password_style.css">
</head>
<body>
<div id="wrapper">

<?php
if(empty($_SESSION['password'])) {
?>
 <form method="post" action="" id="login_form">
  <h1>กรุณาใส่รหัส</h1>
  <input type="password" name="pass" placeholder="*******">
  <input type="submit" name="submit_pass" value="ยืนยัน">
  <!-- <p>"Password : 123"</p> -->
  <p><font style="color:red;"><?php if(!empty($error)) {echo $error;};?></font></p>
 </form> <?php 
} elseif ($_SESSION['password']=="123456")
{
 ?>
 <h1>รหัสผ่านถูกต้อง กำลังเปลี่ยนหน้าไปยังระบบบันทึกข้อมูล...</h1>
 <script type="text/javascript">
    //window.location = "index.php";
	setTimeout("location.href = 'index.php';",700);
</script>
 <?php	
}
?>

</div>
</body>
</html>