<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
$admin_name=$_POST['admin_name'];
$admin_pass=$_POST['admin_pass'];
$sql_select="select * from admin where admin_name='".$_POST['admin_name']."'";
$result=mysqli_query($conn,$sql_select);
if($admin_name==""){
	echo "<script>alert('账号不能为空！');history.go(-1)</script>";
	exit;
}elseif(mysqli_fetch_array($result)){
	echo "<script>alert('该账号已存在，请重新输入！');
		history.go(-1);</script>";
	exit;
}
if($admin_pass==""){
	echo "<script>alert('密码不能为空！');history.go(-1)</script>";
	exit;
}
$sql_add="insert into admin(admin_name,admin_pass) values('{$admin_name}','{$admin_pass}')";
if(mysqli_query($conn,$sql_add)){
	echo "<script>alert('添加成功！');
		window.location.href='admin_list.php';</script>";
	exit;
}
?>