<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>อัพโหลดไฟล์</title>
</head>
<body>
    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <h2>อัพโหลดไฟล์</h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="file" id="fileSelect">
        <input type="submit" name="submit" value="Upload">
        <!-- <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p> -->
		<br><br>
		<h2>ดูรายการไฟล์ทั้งหมด</h2>
		<a href='uploads/?C=M;O=D'>Index of /memo/uploads</a>
		<br><br>
		<h2>ระบบจัดการไฟล์ - Tiny File Manager</h2>
		<a href='tinyfilemanager.php'>Tiny File Manager</a>
		<br><br><br><br>
		<a href='index.php'>กลับไปหน้าหลัก</a>
    </form>
</body>
</html>