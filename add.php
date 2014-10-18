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
	<div class="add">
	<div class="add1">
	<?php echo"
	<form name='formadd' action='adduser.php' method='POST' onsubmit='return checkadduser()'>
	<table style='color:white;'>
		<tr><td>Username : </td><td><input type='text' name='username' size='25'/></td></tr>
		<tr><td>Password : </td><td><input type='password' name=password size='25'/></br></td></tr>
		<tr><td>Re-Password : </td><td><input type='password' name='repassword' size='25'/></br></td></tr>
		<tr><td>Email : </td><td><input type='text' name='email' size='25'/></br></td></tr>
		<tr><td>First Name : </td><td><input type='text' name='firstname' size='25'/></br></td></tr>
		<tr><td>Last Name : </td><td><input type='text' name='lastname' size='25'/></br></td></tr>
		<tr><td></td><td><input type='submit' name='addsubmit' onclick='return checkmail(this.form.email)' value='Add' size='25'/>
		<input type='reset' name='resetsub'  value='Clear' size='25'/></td></tr>
	</table>
	</form>";
	?>
	<?php echo" <script type='text/javascript'>
	function checkadduser(){
		if (document.formadd.username.value=='') {
			alert('username not null');
			document.formadd.username.focus();
			return false;
		};
		if (document.formadd.password.value=='') {
			alert('password not null');
			document.formadd.password.focus();
			return false;
		};
		if (document.formadd.repassword.value != document.formadd.password.value)
		{
			alert('re-password not same');
			document.formadd.repassword.focus();
			return false;
		}
		if (document.formadd.email.value=='') {
			alert('mail not null');
			document.formadd.email.focus();
			return false;
		}
		if (document.formadd.firstname.value=='') {
			alert('first name not null');
			document.formadd.firstname.focus();
			return false;
		}
		if (document.formadd.lastname.value=='') {
			alert('last name not null');
			document.formadd.lastname.focus();
			return false;
		}
		return true;
	}
	</script>";
	?>
	<?php
	echo "<script type='text/javascript'>
	function checkmail(e){
		var loi = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
		var kt=loi.test(e.value);
		if (kt==false) {
			alert('Mail Invalid');
			e.select();
		};
		return kt;
	}
	</script>";
	?>
	</div>
	</div>
</body>
</html>
