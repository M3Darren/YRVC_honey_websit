<?php
session_start();
require_once("../public/conn.php");
header("content-type:text/html;charset=utf-8");
$admin_name=$_POST["admin_name"];
$admin_pass=$_POST["admin_pass"];
$authcode=$_POST["authcode"];

if(strtolower($_POST["authcode"]!=$_SESSION["authcode"])){
	echo "<script>alert('验证码不正确，请重新输入！');history.back()</script>";
	exit;
}

$sql="select * from admin where 
admin_name='".$admin_name."' and admin_pass='".$admin_pass."'";

$result=mysqli_query($conn,$sql);
if($result){
	$row=mysqli_num_rows($result);
	if($row>0){
		$_SESSION['ischecked']='ok';
		$_SESSION['admin_name']=$_POST['admin_name'];
		echo "<script>alert('登录成功！');window.location.href='index.php'</script>";
		exit;
	}
	else{
		echo "<script>alert('你的账号或密码不正确！');window.location.href='login.php'</script>";
		exit;
	}
	mysqli_close($conn);
}
?>