<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "work";
	
date_default_timezone_set('Asia/Bangkok');

try {
    $DBH = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $DBH->exec("SET time_zone = '+07:00';");
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
}
?>
