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
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="contact.php">Contact</a></li>
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
				<form method="POST">
				<table style="margin-left:150px;margin-top:15px;">
					<tr>
					<td>
					<select name='selectid'>
					<?php require_once('function.php');
						$index = new createnew;
						echo $index->postselect();
					?>
					</select>
					</td>
					<td><input type="submit" name="editad" value="Show"></td>
					</tr>
				</table>
				</form>
				<form action="deletepost.php" name='formedit' method="POST" onsubmit="return checkpost()" enctype='multipart/form-data'>
					<table style="margin-left:150px;margin-top:15px;">
					<tr style="color:red;"><th>idpost</th>
					<th>Title</th>
					<th>User id</th>
					<th>Date Post</th>
					<th>Images</th>
					</tr>
						<?php require_once('function.php');
						$show=new createnew;
						echo $show->deleteselected();
						?>
					</table>
				</form>
				</div>
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
