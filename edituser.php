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
						echo $index->userselect();
					?>
					</select>
					</td>
					<td><input type="submit" name="editad" value="Show"></td>
					</tr>
				</table>
				</form>
				<form action="edituser1.php" name='formedit' method="POST" onsubmit="return checkpost()" enctype='multipart/form-data'>
					<table style="margin-left:150px;margin-top:15px;">
					<tr style="color:red;">
					<th>id user</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Id Role</th>
					</tr>
						<?php require_once('function.php');
						$show=new createnew;
						echo $show->userselectid();
						?>
					</table>
				</form>
				<?php
				echo "<script type='text/javascript'>";
				echo "function checkpost(){
				if (document.formedit.username.value=='') {
					alert('username not null');
					document.formedit.username.focus();
					return false;
				};
				if (document.foredit.pasword.value=='') {
					alert('password not null');
					document.formedit.password.focus();
					return false;
				};
				if (document.formedit.email.value==''){
					alert('email not null');
					document.formedit.email.focus();
					return false;
				}
				if (document.formedit.firstname.value==''){
					alert('firstname not null');
					document.formedit.firstname.focus();
					return false;
				}
				if (document.formedit.lastname.value==''){
					alert('lastname not null');
					document.formedit.lastname.focus();
					return false;
				}
				if (document.formedit.idrole.value==''){
					alert('idrole not null');
					document.formedit.idrole.focus();
					return false;
				}
				return true;
				}";
				echo "</script>";
				?>
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
