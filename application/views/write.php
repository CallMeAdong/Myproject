<?php
?>
<html>
	<head>
		<style>
			body{
				width: 500px;
				height: 400px;
				margin: 0px auto;
				
			}
			.news{
				text-align: center;
			}
			.writebox{
				line-height: 21px;
				text-align: left;
				margin: 0px auto;
				width: 400px;
				height: 80px;
			}
			.time{
				float: right;
				width: 200px;
				
			}
			p{
				width: 57px;
			}
			.sub{
				width: 57px;
				height: 21px;
				background-color: aquamarine;
			}
		</style>
	</head>
	<body>
		<h1 class="news">说说</h1>
		<form action="addnews" method="post">
		<div class="writebox"><textarea name="text" style="width:400px;height: 80px;"></textarea></div>
		<div class="time">
			<?php
				$time=$time;
				print_r($time);
				?>
		</div>
		<input type="submit" value="onload" style="margin-left: 215px; margin-top: 21px;">
	</body>
	
	
	
</html>