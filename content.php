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
				<li><a href="add.html">Add User</a></li>
				<li><a href="addpost.html">Add Post</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="#"><?php session_start(); printf("Username : %s--Role : %s",$_SESSION['username'],$_SESSION['rolename']);?></a></li>
			</ul>
		</div>
		<div class="boder"></div>
	</header>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col1">
				
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
