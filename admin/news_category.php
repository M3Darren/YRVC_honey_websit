<?php
//require_once('session.php');
require_once('../public/conn.php');
?>
<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel=stylesheet type=text/css href="css/table.css">
<title>添加管理员</title>
</head>
<body>	
	<form name="form_add" id="form_add" action="?act=add" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr><td colspan="6" class="tt">添加新闻动态类别</td></tr>
			<tr>
				<td width="6%">标题</td>
				<td width="30%"><input type="text" name="title" id="title"/></td>
				<td width="13%">排序</td>
				<td width="20%"><input type="text" name="sort" id="sort"/></td>
				<td colspan="2" width="23%"><input type="submit" name="botton" value="提交"/></td>
			</tr>
		</table>
		</form>	<br />
		<table>
			<tr><td colspan="5" class="tt">新闻动态类别列表</td></tr>
			<tr><td>id</td><td>标题</td><td>排序</td><td colspan="2">操作</td></tr>
			<?php
			$sql="select * from news_category order by id desc";
			$result=mysqli_query($conn, $sql);
			$row=mysqli_num_rows($result);
			if($row>0){
				while($row=mysqli_fetch_array($result)){
					?>
			<form name="form1" action="?act=modify&id=<?=$row['id']?>" method=post>
				<tr>
					<td><?=$row['id']?></td>
					<td><input name="title" type="text" value="<?=$row['title']?>"</td>
					<td><input name="sort" type="text" value="<?=$row['sort']?>"</td>
					<td colspan="2">
						<input type="submit" value="修改" />
						<input type="button" value="删除" 
							onclick="window.location.href='?act=del&id=<?=$row['id']?>'" />
					</td>
				</tr>
			</form>
					<?php
								
				}
				mysqli_free_result($result);
			}else{
				?>
				<tr><td colspan="5">暂无记录！</td></tr>
								
				<?php
			} 
			?>
			<tr></tr>
		</table>
</body>
</html>
<?php
if($_GET['act']=="add"){
	if($_POST['title']==""){
		echo "<script>alert('标题不能为空！');history.go(-1)</script>";
		exit;
	}
	if(!is_numeric(intval($_POST['sort']))){
		echo "<script>alert('排序必须为数字！');history.go(-1)</script>";
		exit;
	}
	$sql_add="insert into news_category(title,sort) 
	          values('{$_POST['title']}','{$_POST['sort']}')";
	if(mysqli_query($conn, $sql_add)){
		echo "<script>alert('添加成功！');window.location.href='news_category.php';</script>";
		exit;
	}else{
		echo "<script>alert('添加失败！');window.location.href='news_category.php';</script>";
		exit;
	}
}
if($_GET['act']=="modify"){
	if($_POST['title']==""){
		echo "<script>alert('标题不能为空！');history.go(-1)</script>";
		exit;
	}
	if(!is_numeric(intval($_POST['sort']))){
		echo "<script>alert('排序必须为数字！');history.go(-1)</script>";
		exit;
	}
	$sql_modify="update news_category set title='{$_POST['title']}',sort='{$_POST['sort']}'
	          where id='{$_GET['id']}'";
	if(mysqli_query($conn, $sql_modify)){
		echo "<script>alert('修改成功！');window.location.href='news_category.php';</script>";
		exit;
	}else{
		echo "<script>alert('修改失败！');window.location.href='news_category.php';</script>";
		exit;
	}
}
if($_GET['act']=="del"){
	$sql_del="delete from news_category where id='{$_GET['id']}'";
	if(mysqli_query($conn, $sql_del)){
		echo "<script>alert('删除成功！');window.location.href='news_category.php';</script>";
		exit;
	}else{
		echo "<script>alert('删除失败！');window.location.href='news_category.php';</script>";
		exit;
	}
}
mysqli_close($conn);
?>