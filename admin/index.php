<?php
session_start();
require_once('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>网站管理系统1.0</title>
</head>
<frameset rows="118,*,30" cols="*" frameborder="0" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="190,*" framespacing="0" frameborder="no" border="0">
    <frame src="left.php" name="leftFrame" scrolling="auto" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="right.php" name="mainFrame" scrolling="auto" noresize="noresize" id="mainFrame" title="mainFrame" />
  </frameset>
  <frame src="bottom.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
