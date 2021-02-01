<?php
if(!session_id()) session_start();
if (!isset($_SESSION['ischecked'])|| $_SESSION['ischecked']<>"ok"){
	header("Content-type:text/html;charset=utf-8");
	echo "<script>alert('请登录！');window.parent.location.href='login.php'</script>";
	exit;
}

?>