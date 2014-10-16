<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact</a></li>
				<?php 
				require_once('function.php');
				$menu = new createnew();
				echo $menu->sessionstar();
				?>
			</ul>
		</div>
		<div class="boder"></div>
	</header>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col1">
				<?php require_once('function.php');
					$index = new createnew;
					echo $index->selectpost();
				?>
				</div>
				<div class="col2" style="float:right;">
				<?php require_once('function.php');
					$date = new createnew;
					echo $date->datetime();
				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
