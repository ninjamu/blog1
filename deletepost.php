<?php
	require_once('connect.php');
	$idpost=$_POST['idpost'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$sql="DELETE FROM `post` WHERE `idpost`='".$idpost."'";
	if(isset($_POST['editsub']))
	{
		if (mysql_query($sql)) {	
			echo "Delete Successful <a href='delete.php'>Back</a>";
			}
		else
			{
				mysql_error();
				echo "Delete Error <a href='delete.php'>Back</a>";
			}
	}
?>