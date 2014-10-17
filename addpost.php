<?php
	require_once('connect.php');
	$date = date('d.m.Y');
	$title = mysql_real_escape_string($_POST['tittle']);
	$userid = 1;
	$images=$_FILES['imagess']['name'];
	$move = move_uploaded_file($_FILES['imagess']['tmp_name'],'images/'.$_FILES['imagess']['name']);
	$content= mysql_real_escape_string($_POST['contentt']);
	if(isset($_POST['addsubmit']))
	{
		if($move){
		$sql = "INSERT INTO `blog`.`post` (`title`, `content`, `userid`, `dateofpost`, `image`) VALUES ('".$title."','".$content."','".$userid."','".$date."','".$images."')";
		mysql_query($sql);
		echo "add susscessful <a href='index.php'>Home</a>";
		}
		else
		{
			echo "file Upload not images <a href='addpost1.php'>Back </a>";
		}
		
	}
?>