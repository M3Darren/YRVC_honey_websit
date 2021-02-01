<?php
	require_once "public/conn.php";
	error_reporting(E_ALL&~E_NOTICE);
	$sql_config="select * from config";
	$result_config=mysqli_query($conn,$sql_config);
	$row_config=mysqli_fetch_array($result_config);
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?=$row_config['site_title']?></title>
		<link rel=stylesheet href="css/style.css">
		<link rel=stylesheet href="css/news.css">
	</head>
	<body>
		<div class="top">
			<div class="left"><img src="img/logo.png" width="238" height="53" /></div>
			<div class="right">服务热线&nbsp;&nbsp;<?=$row_config['company_phone']?></div>
		</div>
		<div class="nav">
			<div class="nav-centerbox">
				<a href="index.php" class="sp">首页</a>
				<a href="about.html">关于花公子</a>
				<a href="news.html">新闻动态</a>
				<a href="product.html">产品中心</a>
				<a href="message.html">给我留言</a>
				<a href="contact.html">联系我们</a>
			</div>
		</div>
		<div class="banner">
			<div class="banner-centerbox"></div>
		</div>
		<div class="main-news">
			<div class="left">
				<div class="sidebar_common">
					<div class="cattitle">新闻类别</div>
					<div class="catcontent">
						<?php
							$sql="select * from news_category";
							$result=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_array($result)){
							?>
							
						<div class="item">
							<div class="left">
								<img src="img/icon-bee.png" width="20" height="24" />
							</div>
							<a class="right" href="news.php?catid=<?=$row['id']?>&cattitle=<?=$row['title']?>"><?=$row['title'];?></a>
						</div>
						<?php	
							}
							mysqli_free_result($result);
							?>
					</div>
					
				</div>
				<div class="sidebar_contact">
					<div class="cattitle">联系我们</div>
					<div class="catcontent">
						<div class="item">地址：广州省惠州市惠城区</div>
						<div class="item">免费热线：<?=$row_config['company_phone']?></div>
						<div class="item">网址</div>
						<div class="item">电子邮箱：<?=$row_config['company_email']?></div>
						<div class="item">QQ:123456789</div>
						<div class="item">微信：<?=$row_config['company_weixin']?></div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="subnav">
					您现在的位置:<a href="index.php">首页</a>><a href="#"><?=$_GET['cattitle']?></a>
				</div>
				<div class="catcontent">
					<?php
						$catid=(empty($_GET['catid']))?"":"where id=".$_GET['catid'];
						$total_num=mysqli_num_rows(mysqli_query($conn,"select id from news {$catid}"));
						$pagesize=2;
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
$result_news=mysqli_query($conn,$sql);
	
	if($total_num>0){
	while($row_new=mysqli_fetch_array($result_news)){
							?>
					<div class="row">
						<a href="#"><?=$row_new['title']?></a>
						<div class="pubdate"><?=$row_new['pubdate']?></div>
					</div>
					<?php
					}
					mysqli_free_result($result_news);
						}
						?>
				
					<div class="page">
						<?php
							$catid=(empty($_GET['catid']))?"":"&catid=".$_GET['catid'];
							?>
						<a href="?page=<?=$page_num?><?=$catid?>">尾页</a>
						<a href="?page=<?=$nextpage?><?=$catid?>">下一页</a>
						<?php
							for($i=$page_num;$i>0;$i--){
							?>
						<a href="?page=<?=$i?><?=$catid?>"><?=$i?></a>
						<?php
						}
							?>
						<a href="?page=<?=$prepage?><?=$catid?>">上一页</a>
						<a href="?page=1"<?=$catid?>>首页</a>
					</div>
				</div>
			</div>
		</div>
			<div class="friend">
				<div class="left">友<br/>情<br/>链<br/>接</div>
				<div class="right">
					<a href="#">花公子天猫旗舰店</a>
					<a href="#">花公子科技有限公司</a>
					<a href="#">淘小蜜科技</a>
					<a href="#">知网网络科技有限公司</a>
					<a href="#">中国蜂蜜网</a>
					<a href="#">花公子淘宝店</a>
					<a href="#">惠州经济职业技术学院</a>
					<a href="#">惠州职业网络技术专业</a>
					<a href="#">指尖科技有限公司</a>
					<a href="#">惠经论坛</a>
				</div>
			</div>
			<div class="footer">
				<div class="footer-centerbox">
					<div class="left">
						公司地址:<?=$row_config['company_address']?><br/> 
						Copyright@2017 <?=$row_config['company_name']?> All rights reserved.<br /> 
						联系电话:<?=$row_config['company_phone']?> E-mail:<?=$row_config['company_email']?><br/> 
						备案号：粤ICP备000000号
					</div>
					<div class="right">
						<img src=" img/ewm.jpg" width="96" height="96">
					</div>
				</div>
			</div>
	</body>
</html>