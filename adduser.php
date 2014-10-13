<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="add">
	<div class="add1">
	<form name="formadd" action="adduser.php" method="POST" onsubmit="return check()">
	<table>
		<tr><td>Username : </td><td><input type="text" name="username" size="25"/></td></tr>
		<tr><td>Password : </td><td><input type="text" name="password" size="25"/></br></td></tr>
		<tr><td>Re-Password : </td><td><input type="text" name="repassword" size="25"/></br></td></tr>
		<tr><td>Email : </td><td><input type="text" name="email" size="25"/></br></td></tr>
		<tr><td>First Name : </td><td><input type="text" name="firstname" size="25"/></br></td></tr>
		<tr><td>Last Name : </td><td><input type="text" name="lastname" size="25"/></br></td></tr>
		<tr><td>Role</td><td><select name="role">			
			<option value="1">Admin</option>
			<option value="2">Member</option>
		</select></br></td></tr>
		<tr><td></td><td><input type="submit" name="addsubmit" onclick="return checkmail(this.form.email)" value="Add" size="25"/>
		<input type="reset" name="resetsub"  value="Clear" size="25"/></td></tr>
	</table>
	</form>
	<?php
	require_once("connect.php");
	$u=$_POST['username'];
	$p=$_POST['password'];
	$e=$_POST['email'];
	$ln=$_POST['lastname'];
	$fn=$_POST['firstname'];
	$rl=$_POST['role'];
	$sql = "select * from user where username='".$u."'";
	$query=mysql_query($sql);
	if(mysql_num_rows($query) !="")
	{
		echo "Username exist";
	}
	else
	{
		$sql="insert into user(id,username,password,email,firstname,lastname,role) values('""','".$u."','".$p."','".$e."','".$ln."','".$fn."','".$rl."')";
		$query2 =mysql_query($sql);
		echo "add successful";
	}
	?>
	<script type="text/javascript" language="javascript">
	function check(){
		if (document.formadd.username.value=="") {
			alert('username not null');
			document.formadd.username.focus();
			return false;
		};
		if (document.formadd.password.value=="") {
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
		if (document.formadd.email.value=="") {
			alert('mail not null');
			document.formadd.email.focus();
			return false;
		}
		if (document.formadd.firstname.value=="") {
			alert('first name not null');
			document.formadd.firstname.focus();
			return false;
		}
		if (document.formadd.lastname.value=="") {
			alert('last name not null');
			document.formadd.lastname.focus();
			return false;
		}
		return true;
	}
	</script>
	<script type="text/javascript" language="javascript">
	function checkmail(e){
		var loi = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
		var kt=loi.test(e.value);
		if (kt==false) {
			alert('Mail Invalid');
			e.select();
		};
		return kt;
	}
	</script>
	</div>
	</div>
</body>
</html>
