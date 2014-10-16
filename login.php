<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" href="js/java.js"></script>
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
				$menu = new createnew;
				echo $menu->sessionstar();
				?>
			</ul>
		</div>
		<div class="boder"></div>
	</header>
	<div class="add">
	<div class="add1">
	<?php
	echo "<form name='formadd' action='logins.php' method='POST'>
	<table>
		<tr><td>Username : </td><td><input type='text' name='username' size='25'/></td></tr>
		<tr><td>Password : </td><td><input type='password' name='password' size='25'/></br></td></tr>		
		<tr><td></td><td><input type='submit' name='addsubmit' value='Add' size='25'/>
		<input type='reset' name='resetsub'  value='Clear' size='25'/></td></tr>
	</table>
	</form>";
	echo "<script type='text/javascript' language='javascript'>
	function checklogin(){
	if (document.formadd.username.value=''){
		alert('username not null');
		document.formadd.username.focus();
		return false;
	};
	if(document.formadd.password.value=''){
		alert('password not null');
		document.formadd.password.focus();
		return false;
	}
	return true;
	}
	</script>";
	?>
	</div>
	</div>
</body>
</html>
