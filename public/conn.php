<?php
$conn=mysqli_connect("localhost","root","","honey");
if (!$conn){
	die('数据库连接失败：').mysqli_connect_error();
	}

?>