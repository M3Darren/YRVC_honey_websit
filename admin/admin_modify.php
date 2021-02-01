<?php
//require_once('session.php');
require_once('../public/conn.php');
$sql="select * from admin where id='{$_GET['id']}'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>修改管理员</title>
</head>
<body>	
	<form name="form_add" id="form_add" action="admin_modify_pass.php?id=<?=$row['id']?>" method="post">
		修改管理员</br> 
		*账号&nbsp;&nbsp;
		<input name="admin_name" type="text" size="30" value="<?=$row['admin_name']?>" disabled='disabled'/>
		</br>*密码&nbsp;&nbsp;
		<input name="admin_pass" type="password" id="admin_pass" size="31"/>&nbsp;请输入新密码！</br>
		<input class="btn" type="submit" name="button"
				id="button" value="修改" />
	</form>
</body>
</html>