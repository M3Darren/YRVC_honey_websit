<?php
require_once('session.php');
require_once('../public/conn.php');
?>
<html>
	<head>
		<link href="css/table.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<table >
			<tr><td colspan="2" >管理员列表</td></tr>
<tr><td width="20%">账号</td><td width="80%">操作</td></tr>
<?php
$total_num=mysqli_num_rows(mysqli_query($conn, "select id from admin"));
$pagesize=10;
$page_num=ceil($total_num/$pagesize);
$page=$_GET['page'];
if($page<1||$page==''){$page=1;}
if($page>$page_num){$page=$page_num;}
$offset=$pagesize*($page-1);
$prepage=($page<>1)?$page-1:$page;
$nextpage=($page<>$page_num)?$page+1:$page;
$sql="select * from admin limit $offset,$pagesize";
$result=mysqli_query($conn, $sql);
if($total_num>0){
	while($row=mysqli_fetch_array($result)){
echo "<tr><td>{$row['admin_name']}</td>";
		
?>

<td>
		<input class="btn" type="button" name="button" id='button' 
			value="修改" onclick="window.location.href='admin_modify.php?id=<?=$row['id']?>'"
				<?php if($row['admin_name']=='admin'){echo "disable='disable";}?>/>
		<input class="btn" type="button" name="button2" id='button2' 
			value="删除" onclick="window.location.href='admin_delete.php?id=<?=$row['id']?>'"/>
</td></tr>
<?php		
	}
}
mysqli_close($conn);

?>
<tr><td colspan="2">
	<?=$page?>/<?=$page_num?>&nbsp;&nbsp;
	<a href="admin_list.php?page=1">首页</a>&nbsp;&nbsp;
	<a href="?page=<?=$prepage?>">上一页</a>&nbsp;&nbsp;
	<a href="?page=<?=$nextpage?>">下一页</a>&nbsp;&nbsp;
	<a href="?page=<?=$page_num?>">尾页</a>
		</tr></td></table>
</body>
</html>