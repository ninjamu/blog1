<?php
	require_once('connect.php');
	$iduser=$_POST['iduser'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$lastname=$_POST['lastname'];
	$firstname=$_POST['firstname'];
	$idrole=$_POST['idrole'];
	$sql="UPDATE `user` SET `username`='".$username."', `password`='".$password."',`email`='".$email."',`lastname`='".$lastname."',`firstname`='".$firstname."',`idrole`='".$idrole."' WHERE `iduser`='".$iduser."'";
	if(isset($_POST['editsub']))
	{
		if ($idrole==1 or $idrole==2) {	
			mysql_query($sql);
			echo "Edit Successful <a href='edituser.php'>Back</a>";
			}
		else
			{
				mysql_error();
				echo "Edit Error Idrole 1 = Admin or 2 = Members <a href='edituser.php'>Back</a>";
			}
	}
?>