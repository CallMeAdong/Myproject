<?php
//print_r($list);
$u=$list;
//print_r($u);
//print_r $u[1];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息</title>
    <style>
        *{
            margin:0 auto;padding: 0px;list-style: none;
        }
        .table{
            margin: 0 auto;
            width: 160px;
            height: 400px;
            padding: 10px;
        }
        .ji{
        	width: 60px;
           
            float: left;
        }
        .ou{
           
            width: 100px;
            float: left;
        }
    </style>
</head>
<body>
<div class="table">
    <ul>
        <li class="ji">name:</li>
        <li class="ou"><?php echo $u[0]['name'] ?></li>
    </ul>
    <ul>
        <li class="ji">dob:</li>
        <li class="ou"><?php echo $u[0]['dob'] ?></li>
    </ul>
    <ul>
        <li class="ji">Add:</li>
        <li class="ou"><?php echo $u[0]['Add'] ?></li>
    </ul>
    <ul>
        <li class="ji">gender:</li>
        <li class="ou"><?php echo $u[0]['gender'] ?></li>
    </ul>
    <ul>
        <li class="ji">phone:</li>
        <li class="ou"><?php echo $u[0]['cellphone'] ?></li>
    </ul>
</div>
</body>
</html>
