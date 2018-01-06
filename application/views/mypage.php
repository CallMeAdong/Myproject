<?php
	//print_r($list);
	$u=$list;
	//print_r($u);
	$id=$u[0]['Uid'];
	$name=$u[0]['name'];
	$f=$listfriend;
	//print_r($f);
	//print_r($listfriendnews);
	//$news=$listnews;
	//print_r($news);
//print_r $u[1];
	?>
<html>
	<head>
		<style type="text/css">
			body{
				width: 100%;
			}
			.userid{
				width: 160px;
				height: 140px;
			
				float: left;
			}
			.navbar{
				margin-left: 20px;
				margin-top: 110px;
				float: left;
				width: 200px;
				height: 30px;
		
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
				float: left;
			}
			.news{
				width: 41%;
				
				float:left;
			}
			.friendlist{
				float: left;
				width: 22%;
				height: 400px;
			}
		</style>
		<head>
	<body>
		<div class="allpage">
			<div class="top">
				<div class="userid"><?php echo "welcome".$name ?></div>
				<div class="navbar">
					<li><a href="">主页</a></li>
					<li><a href="writenews">说说</a></li>
					<li><a href="listphotopage">相册</a></li>
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
						$this->load->view("listnews.php",$listfriendnews);
					
					?>
					</div>
					<div class="friendlist">
						<?php
						$this->load->view("listfriends.php",$listfriend);
						?></div>
				</div>
			<div>
		</div>
		<body>	
</html>