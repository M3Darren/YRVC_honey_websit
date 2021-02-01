<?php require_once'session.php'; ?>
<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel=stylesheet type=text/css href="css/table.css">
<title>添加管理员</title>
</head>
<body>	
	<form name="form_add" id="form_add" action="admin_add_pass.php" method="post">
		<p>添加管理员</p> 
		<p>*账号
		<input name="admin_name" type="text" id="admin_name" size="30"/></p>
		<p>*密码
		<input name="admin_pass" type="password" id="admin_pass" 
					size="31"/><p>
		<input class="btn" type="submit" name="button"
				id="button" value="添加" />
	</form>
</body>
</html>