<?php
	require_once('connect.php');
	$u =$_POST['username'];
	$p =$_POST['password'];
	$sql="SELECT * FROM `user`,`role` WHERE `username`='".$u."' and `password`='".$p."' and `user`.`idrole`=`role`.`idrole`";
	$query=mysql_query($sql);
	if(mysql_num_rows($query)==0)
	{
		echo('username or password not true');
		include('login.html');
	}
	else
	{
			$row=mysql_fetch_array($query);
			session_start();
			$_SESSION['username']=$row['username'];
			$_SESSION['role']=$row['idrole'];
			$_SESSION['rolename']=$row['rolename'];
			printf("Your username is %s </br>",$_SESSION['username']);
			printf("role is %s </br>",$_SESSION['rolename']);
			printf("Login successful <a href='index.php'>click home</a></br>");
	}
?>