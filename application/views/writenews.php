<?php
//print_r($list);
	$user=$list;
	//print_r($u);
	$id=$user[0]['Uid'];
	$name=$user[0]['name'];
	$usernews=$listnewsbyid;
	//print_r($usernews);
?>
<html>
	<head>
		<style>
			.allpage{
				width: 580px;
				height: 500px;
				
			}
			li{
				list-style: none;
			}
			.userid{
				width: 100px;
				height: 50px;
				
			}
			.yournews{
				margin-left: 100px;
				width: 380px;
				height: 380px;
				
				float: left;
			}
			.writebox{
				margin-top: -50px;
				width: 50px;
				height: 30px;
				float: right;
			}
			.name{
				margin-top: 21px;
			}
			.date{
				margin-top: 21px;
				margin-left: 183px;
			}
		</style>
		<head>
		<body>
			<div class="allpage">
				<div class="userid"><?php echo "welcome".$name ?></div>
				<div class="yournews">
					<?php
						for($i=count($usernews)-1;$i>=0;$i--){
							echo "<div class='name'>".$usernews[$i]['uname']."</div>";
							echo "<div class='news'>".$usernews[$i]['text']."</div>";
							echo "<div class='date'>".$usernews[$i]['date']."</div>";
							
						}
						?>
					
				</div>
				<div>
					<li class="writebox"><a href="write">写说说</a></li>
				</div>
			</div>
			
		</body>
</html>