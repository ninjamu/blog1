<?php
	require_once('connect.php');
	$idpost=$_POST['idpost'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$image=$_FILES['image']['name'];
	$move=move_uploaded_file($_FILES['image']['tmp_name'],"images/".$_FILES['image']['name']);
	$sql="UPDATE `post` SET `title`='".$title."', `content`='".$content."',`image`='".$image."' WHERE `idpost`='".$idpost."'";
	if(isset($_POST['editsub']))
	{
		if (mysql_query($sql)) {	
			echo "Edit Successful <a href='editpost.php'>Back</a>";
			}
		else
			{
				mysql_error();
				echo "Edit Error <a href='editpost.php'>Back</a>"
			}
	}
?>