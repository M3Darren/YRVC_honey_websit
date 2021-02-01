<?php
require_once('session.php');
require_once('../public/conn.php');
if ($_POST['admin_pass']==""){
	echo "<script>alert('请输入新密码!');history.back();</script>";
	exit;
}
$sql="update admin set admin_pass='{$_POST['admin_pass']}' where id='{$_GET['id']}'";
if(mysqli_query($conn, $sql)){
	echo "<script>alert('修改成功!');window.location.href='admin_list.php'</script>";
	exit;
}
mysqli_close($conn);
?>