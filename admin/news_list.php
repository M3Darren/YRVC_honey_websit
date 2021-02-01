<?php
require_once('session.php'); 
require_once('../public/conn.php');
if($_GET['catid']==""){
	$total_num=mysqli_num_rows(mysqli_query($conn,
	"select news.id,news_category.id from news,news_category 
	where news.catid=news_category.id"));
}else{
	$total_num=mysqli_num_rows(mysqli_query($conn,
	"select news.id,news_category.id from news,news_category 
	where news.catid=news_category.id and news.catid='{$_GET['catid']}'"));
}
$pagesize=10;
$page_num=ceil($total_num/$pagesize);
$page=$_GET['page'];
if($page<1||$page==''){$page=1;}
if($page>$page_num){$page=$page_num;}
$offset=$pagesize*($page-1);
$prepage=($page<>1)?$page-1:$page;
$nextpage=($page<>$page_num)?$page+1:$page;
if($_GET['catid']==""){
	$sql="select news.*,news_category.title as cattitle 
	from news,news_category where news.catid=news_category.id 
	limit $offset,$pagesize";
}else{
	$sql="select news.*,news_category.title as cattitle 
	from news,news_category where news.catid=news_category.id 
	and news.catid='{$_GET['catid']}' limit $offset,$pagesize ";
}
$result=mysqli_query($conn,$sql);
?>
<html>
	<head>
		<link href="css/table.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<table >
			<tr><td colspan="7">新闻动态</td></tr>
			<tr><td colspan="7">按类别检索：
				<select name="catid" onchange="location.replace(this.value)">
					<option value="">--请选择--</option>
					<option value="?catid=""">全部</option>
					<?php
					$result_news_category=mysqli_query($conn,"select * from news_category");
					while($v2=mysqli_fetch_array($result_news_category)){
					?>
					<option value="?catid=<?=$v2['id']?>"
						<?php 
						if($v2['id']==$_GET['catid']){echo 'selected';}
						?>>
					<?=$v2['title']?>
					</option>
					<?php
					}
					?>
				</select>
			</td></tr>
			<tr><td>文章</td><td>标题</td><td>类别</td><td>来源</td><td>发布日期</td><td>操作</td></tr>
			<?php
			if($result){
				while($rs=mysqli_fetch_array($result)){
			?>
			<tr><td><?=$rs['id']?></td>
				<td><?=$rs['title']?></td>
				<td><?=$rs['cattitle']?></td>
				<td><?=$rs['comefrom']?></td>
				<td><?=$rs['pubdate']?></td>
				<td><input name="button" type="submit" value="修改" 
					onclick="window.location.href='news_modify.php?id=<?=$rs['id']?>'" /></td>
				<td><input name="button2" type="submit" value="删除" 
					onclick="window.location.href='news_delete.php?id=<?=$rs['id']?>'" /></td>
			</tr>
			<?php
				}
				mysqli_free_result($result);
			}else{
			?>
			<tr><td colspan="7">暂无记录！</td></tr>
			<?php
			}
			mysqli_close($conn)
			?>
			<tr><td colspan="7">
					<?=$page?>/<?=$page_num?>&nbsp;&nbsp;
					<a href="?page=1&catid=<?=$_GET['catid']?>">首页</a>&nbsp;&nbsp;
					<a href="?page=<?=$prepage?>&catid=<?=$_GET['catid']?>">上一页</a>&nbsp;&nbsp;
					<a href="?page=<?=$nextpage?>&catid=<?=$_GET['catid']?>">下一页</a>&nbsp;&nbsp;
					<a href="?page=<?=$page_num?>&catid=<?=$_GET['catid']?>">尾页</a>
			</td></tr>
</table>
</body>
</html>