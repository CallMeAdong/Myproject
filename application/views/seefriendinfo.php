<?php
	$userinfo=$list;
	//print_r($u);
	$id=$userinfo[0]['Uid'];
	$name=$userinfo[0]['name'];
	$news=$list1;
	print_r($f);
//print_r $u[1];
	?>
<html>
	<head>
		<style type="text/css">
			body{
				width: 100%;
				background-color: coral;
			}
			.userid{
				width: 160px;
				height: 140px;
				background-color: red;
				float: left;
			}
			.navbar{
				margin-left: 20px;
				margin-top: 110px;
				float: left;
				width: 200px;
				height: 30px;
				background-color: aquamarine;
			}
			li{
				line-height: 43px;
				width: 50px;
				height: 30px;
				list-style: none;
				float: left;
			}
			.botton{
				padding-top: 160px;
			}
			.info{
				line
				width: 22%;
				height: 400px;
				background-color: cornflowerblue;
				float: left;
			}
			.news{
				width: 40%;
				height: 400px;
				background-color:cyan ;
				float:left;
			}
			.friendlist{
				float: left;
				background-color: black;
				width: 22%;
				height: 400px;
			}
		</style>
		<head>
	<body>
		<div class="allpage">
			<div class="top">
				<div class="userid"><?php echo $name."homepage" ?></div>
				<div class="navbar">
					<li><a href="">主页</a></li>
					<li><a href="seefriendnews">说说</a></li>
					<li><a href="">相册</a></li>
					<li><a href="">留言</a></li>
				</div>
			</div>
			<div class="botton">
				<div class="info">
					<?php                          //包含listinfo.php
						$this->load->helper("url");
						//redirect("test/listuser","refresh")
						$this->load->view("listuser.php",$list);
						?>;
				</div>
				<div class="right">
					<div class="news">
					<?php
						
					
					?>
					</div>
					<div class="friendlist">
						<?php
						$this->load->view("listfriends.php",$list1);
						?></div>
				</div>
			<div>
		</div>
		<body>	
</html>