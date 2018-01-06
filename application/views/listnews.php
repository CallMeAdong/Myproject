<?php
	$news=$listfriendnews;
	//print_r($news);
?>
<html>
	<head>
		<title>news</title>
		<style>
			.name{
				margin-top: 21px;
			}
			.date{
				margin-top: 21px;
				margin-left: 183px;
			}
		</style>
	</head>
	<body>
		<h1 text-align="center">news</h1>
		<div class="newsbox">
			<?php
				for($i=count($news)-1;$i>=0;$i--){
					echo "<div class='name'>".$news[$i]['uname']."</div>";
					echo "<div class='news'>".$news[$i]['text']."</div>";
					echo "<div class='date'>".$news[$i]['date']."</div>";
				}
				
				?>
		</div>
	</body>
</html>