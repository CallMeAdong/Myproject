<?php
	$userinfo=$list;
	print_r($userinfo);
	$id=$userinfo[0]['Uid'];
	$name=$userinfo[0]['name'];
	$news=$listnews;
	print_r($news);
	//print_r($f);
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
				width: 40%;
				height: 400px;
			
				float:left;
			}
			.name{
				margin-left: 0px;
				width: 80px;
				
			}
			.date{
				text-align: right;
			}
			.add{
				margin-top: 400px;
			}
		</style>
		<head>
	<body>
		<div class="allpage">
			<div class="top">
				<div class="userid"><?php echo $name."'s homepage" ?></div>
				<div class="navbar">
					<li>
						<?php
						echo "<a href='".site_url("seefriendphoto/".$name)."'>相册</a></li>";
					?>	
				</div>
			</div>
			<div class="botton">
				<div class="info">
					<?php                          
						$this->load->helper("url");
						//redirect("test/listuser","refresh")
						$this->load->view("listuserinfo.php",$list);
						?>
						</div>
					<div class="news">
						<?php
							for($i=0;$i<count($news);$i++){
								echo "<div class='name'>".$news[$i]['uname']."</div>";
								echo "<div class='text'>".$news[$i]['text']."</div>";
								echo "<div class='date'>".$news[$i]['date']."</div>";
							}
							?>
					</div>
		<body>	
</html>