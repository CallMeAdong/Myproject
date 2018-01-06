<html>
<head>
<title>login page</title>
<style type="text/css">
	body{
		margin: 1px auto;
		width: 172px;
		height: 140px;
		border-width: 5px;
		border-color: aliceblue;
	}
	.login{
		width: 50px;
		height: 20px;
		float: left;
		margin-top: 0px;
	}
	.add{
		float: right;
	}
	li{
		list-style: none;
	}
</style>
</head>
<body>
<form action="<?php echo site_url("check");?>" method="post">
<p>username<input type="text" name="username"></p>
<p>password<input type="password" name="userpwd"></p>
<div>
	<p class="login"><input type="submit" value="Login">
	<a href="add"><li class="add">注册</li></a>
	</p>
</div>
</body>
</html>
<?php

?>