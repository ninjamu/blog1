<?php
	session_start();
	require_once("connect.php");
	$u=$_POST['username'];
	$p=$_POST['password'];
	$e=$_POST['email'];
	$ln=$_POST['lastname'];
	$fn=$_POST['firstname'];
	$rl=2;
	$sql = "select * from user where username='".$u."'";
	$query=mysql_query($sql);
	if(mysql_num_rows($query) >0)
	{
		echo "Username exist";
	}
	else
	{
		$sql="INSERT INTO `blog`.`user` (`username`, `password`, `email`, `firstname`, `lastname`, `idrole`) VALUES ('".$u."', '".$p."', '".$e."','".$ln."', '".$fn."', '".$rl."')";
		$query2 =mysql_query($sql);
		echo "add successful <a href='index.php'>click home<a>";
	}
?>
