<?php
	require_once('connect.php');
	session_start();
	$id = $_REQUEST['id'];
	$iduser= $_SESSION['userid'];
	$content = mysql_real_escape_string($_POST['comment']);
	$date = date('d.m.Y');
	$sql = "INSERT INTO `blog`.`comment` (`idcomment`, `userid`, `postid`, `content`, `dateofcomment`) VALUES (NULL, '".$iduser."', '".$id."', '".$content."', '".$date."')";
	$query=mysql_query($sql);
	if($_POST['comment'] !="")
	{
		if($query);
		{
			echo "Comment Successful ! <a href='content.php?id=".$id."'>Back</a>";
		}
	}
	else
	{
		echo "Comment not null <a href='content.php?id=".$id."'>Back</a>";
	}
?>