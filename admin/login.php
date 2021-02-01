<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>花公子蜂蜜网站管理系统</title>
		<link rel=stylesheet href="css/login.css">
		<script type="text/javascript">
			function check() {
				var admin_name = document.getElementById("admin_name").value;
				var admin_pass = document.getElementById("admin_pass").value;
				var authcode = document.getElementById("authcode").value;
				if(admin_name == "") {
					alert("请输入账号！");
					document.getElementById("admin_name").focus();
					return false
				} else if(admin_pass == "") {
					alert("请输入密码！");
					document.getElementById("admin_pass").focus();
					return false
				} else if(authcode == "") {
					alert("请输入验证码！");
					document.getElementById("admin_pass").focus();
					return false
				} else {
					document.getElementById("form1").submit();
					return true;
				}
			}
		</script>
	</head>
	<body>
		<form name="form1" id="form1" action="login_check.php" method="post" onsubmit="return check()">
			<div class="item">
				<div class="text">
					账&nbsp;&nbsp;号
				</div>
				<div class="inputbox">
					<input type="text" name="admin_name" id="admin_name" />
				</div>
			</div>
			<div class="item">
				<div class="text">
					密&nbsp;&nbsp;码
				</div>
				<div class="inputbox">
					<input type="text" name="admin_pass" id="admin_pass" />
				</div>
			</div>

			<div class="item">
				<div class="text">
					验证码
				</div>
				<div class="inputbox">
					<input class="authcode" type="text" name="authcode" id="authcode"/>
				</div>

				<div >
					<a style="display: block;float: left;height: 35px;" href="javascript:void(0)"
					onclick="document.getElementById('code').src='authcode.php?id='+Math.random()">
					<img id="code" src="authcode.php" border="0" width="107" height="41"
						style="margin-top: 6px;margin-left: 5px;" />
					</a>
				</div>
			</div>
			<div class="submit">
				<input type="image" src="img/submit.png" />
			</div>
		</form>
	</body>
</html>