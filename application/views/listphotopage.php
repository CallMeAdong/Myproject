<?php
	print_r($listPic);
?>
<html>
	<head>
		<style>
			body{
            width: 360px;
            height: 440px;
            margin: 0px auto;
            background-color: aliceblue;
        }
			.pic{
				
				width: 200px;
				height: 200px;
			}
		</style>
	</head>
	<body>
		<div class="pic">		
		
		<?php 
		foreach($listPic as $pic)
			echo '<img src = "'.base_url($pic['pic']).'" height = "200" width = "200">';
		?>
		</div>

		<div class="onloadpic">
			<a href="onloadphotopage">上传照片</a>
		</div>
	</body>
</html>