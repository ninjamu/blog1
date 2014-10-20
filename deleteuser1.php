<?php
	require_once('connect.php');
	$iduser=$_POST['iduser'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$lastname=$_POST['lastname'];
	$firstname=$_POST['firstname'];
	$idrole=$_POST['idrole'];
	$sql="DELETE FROM `user` WHERE `iduser`='".$iduser."'";
	if(isset($_POST['editsub']))
	{
		if ($idrole==1 or $idrole==2) {	
			mysql_query($sql);
			echo "Edit Successful <a href='deleteuser.php'>Back</a>";
			}
		else
			{
				mysql_error();
				echo "Edit Error Idrole 1 = Admin or 2 = Members <a href='deleteuser.php'>Back</a>";
			}
	}
?>