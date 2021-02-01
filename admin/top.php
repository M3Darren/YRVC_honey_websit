<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
*{padding:0px;margin:0px;}
.top{height:82px;background:url(img/top_back.gif) left center;}
.top .left{height:52px;float:left;width:35%;padding-left:10px;padding-top:30px;color:#FFF;font-size:24px;}
.top .right{height:22px;float:right;width:63%;text-align:right;padding-top:60px;color:#FFF;font-size:12px;}
.submenu{background:url(img/top_bg.gif) top center repeat-x; height:35px;}
.submenu .left{height:35px;line-height:35px;padding-left:10px;color:#000000;font-size:12px;float:left;}
.submenu .right{height:35px;color:#000000;float:right;}
.submenu .right input{height:21px;width:42px;margin-top:6px;margin-right:20px;}
</style>
</head>
<body>
<?php session_start(); ?>
<div class="top">
	<div class="left">花公子蜜蜂网站后台</div>
    <div class="right">当前时间:<span id="time">
<script>
document.getElementById('time').innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());
setInterval("document.getElementById('time').innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);
</script></span>
	</div>
</div>
<div class="submenu">
	<div class="left">当前的用户是：<?php echo $_SESSION['admin_name']; ?></div>
    <div class="right"><input type="button" value="退出" /></div>
</div>
</body>
</html>