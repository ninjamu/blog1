<?php
	require_once('connect.php');
	$date = date('d.m.Y');
	$title = mysql_real_escape_string($_POST['tittle']);
	$userid = 1;
	$images=mysql_real_escape_string($_POST['imagess']);
	$content= mysql_real_escape_string($_POST['contentt']);
	$sql = "INSERT INTO `blog`.`post` (`title`, `content`, `userid`, `dateofpost`, `image`) VALUES ('".$title."','".$content."','".$userid."','".$date."','".$images."')";
	$query=mysql_query($sql);
	if($query)
	{
		echo "add successful <a href='index.php'>click home<a>";
	}
	else
	{
		echo mysql_error();
	}

?>