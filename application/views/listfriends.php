<?php
	$f=$listfriend;
	//print_r($f);
	//echo $f[0]['friendsname'];
?>
<html>
	<head>
		<style>
			.fname{
				width: 100px;
				height: 20px;
			}
			.li{
				background-color: red;
			}
		</style>
	</head>
	<body>
		<h1>friends</h1>
	<div>
		<?php
			for($i=0;$i<count($f);$i++){
				echo "<li class='fname'><a href='gofriendpage/".$f[$i]['fname']."'>".$f[$i]['fname']."</a></li>"."</br>";
			}
			?>
	</div>
	<div >
	<li><a href="addfriendpage">search</a></li>
	</div>
	</body>
</html>