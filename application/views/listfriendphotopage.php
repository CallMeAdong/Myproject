<?php
//print_r($listphoto);
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
		foreach($listphoto as $pic)
			echo '<img src = "'.base_url($pic['pic']).'" height = "200" width = "200">';
		?>
		</div>
	</body>
</html>