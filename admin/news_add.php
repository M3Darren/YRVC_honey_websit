<?php 
	require_once('session.php'); 
	require_once('../public/conn.php');
?>
<!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel=stylesheet type=text/css href="css/table.css">
<title>添加新闻动态文章</title>
</head>
<body>	
	<form name="form1" id="form1" action="news_add_pass.php" method="post">
		<table>
			<tr><td colspan="2">添加新闻动态文章</td></tr>
			<tr><td>*标题：</td><td><input name="title" type="text" size="50"/></td></tr>
			<tr><td>来源：</td><td><input name="comefrom" type="text" value="本站"/></td></tr>
			<tr><td>发布日期：</td><td><input name="pubdate" type="text"
				value="<?php date_default_timezone_set('UTC');echo date("Y-m-d")?>"/></td></tr>
			<tr><td>类别：</td>
				<td><select name="catid">
					<option value="">--请选择--</option>
					<?php
					$result_category=mysqli_query($conn,"select * from news_category");
					while($row_category=mysqli_fetch_array($result_category)){
						echo "<option value={$row_category['id']}>";
						echo $row_category['title'];
						echo "</option>";
					}
					mysqli_free_result($result_category);
					?>
				</select></td></tr>
			<tr><td>关键词：</td>
				<td><textarea name="keywords" cols="60" rows="3"></textarea></td>
			</tr>
			<tr><td>描述：</td>
				<td><textarea name="description" cols="60" rows="3"></textarea></td>
			</tr>
			<tr><td>内容：</td>
				<td><textarea name="content" cols="60" rows="3"></textarea></td>
			</tr>
			<tr><td><input type="submit" value="添加"/></td></tr>
		</table>
	</form>
</body>
</html>