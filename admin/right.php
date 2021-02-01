<?php require_once'session.php'; ?>
<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel=stylesheet type=text/css href="css/right.css">
<title>无标题文档</title>
<style type="text/css">

</style>
</head>
<body>
<table class="explain" cellspacing="0" cellpadding="0" width="100%" height="205">
	<tr>
		<td class="left_bt2" height="27" background="img/news-title-bg.gif"
			width="31%">&nbsp;&nbsp;&nbsp;程序说明			
		</td>
		<td class="left_bt2" background="img/news-title-bg.gif"	width="69%"></td>
	</tr>
	<tr>
		<td height="240" valign="top" colspan="2">
			<table width="95%" height="153" border="0" align="center" cellpadding="2" cellspacing="1">
				<tr>
					<td height="60" width="48%">用户名：<?php echo $_SESSION['admin_name'];?>
					</td>
					<td width="52%">ip：<?php echo $_SERVER['REMOTE_ADDR'];?></td>
				</tr>
				<tr>
					<td height="60" width="48%">服务器域名：<?php echo $_SERVER['HTTP_HOST'];?>
					</td>
					<td width="52%">脚本解释引擎：<?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
				</tr>
				<tr>
					<td height="60" width="48%">获取php运行方式：<?php echo php_sapi_name();?>
					</td>
					<td width="52%">浏览器版本：<?php echo $_SERVER['HTTP_USER_AGENT'];?></td>
				</tr>
				<tr>
					<td height="60" width="48%">服务器端口：<?php echo $_SERVER['SERVER_PORT'];?>
					</td>
					<td width="52%">系统类型及版本号：<?php echo php_uname();?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
