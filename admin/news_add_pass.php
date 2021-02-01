<?php
require_once('session.php'); 
require_once('../public/conn.php');
if(empty($_POST['title'])){
	echo "<script>alert('标题不能为空！');history.back();</script>";
	exit;
}
if(empty($_POST['catid'])){
	echo "<script>alert('类别不能为空！');history.back();</script>";
	exit;
}
if(empty($_POST['content'])){
	echo "<script>alert('内容不能为空！');history.back();</script>";
	exit;
}
$sql="insert into news(`title`, `comefrom`, `pubdate`, `catid`, `keywords`, `description`, `content`) 
VALUES('{$_POST['title']}','{$_POST['comefrom']}','{$_POST['pubdate']}','{$_POST['catid']}','{$_POST['keywords']}','{$_POST['description']}','{$_POST['content']}')";
if(mysqli_query($conn,$sql)){
	echo "<script>alert('添加成功！');window.location.href='news_list.php';</script>";
	exit;
}else{
	echo "<script>alert('添加失败！');window.location.href='news_list.php';</script>";
	exit;
}
mysqli_close($conn);
?>