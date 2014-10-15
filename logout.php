<?php
	session_start();
	if(session_destroy())
	{
		echo "Logout successful";
	}
	else
	{
		echo "error in destroy";
	}
	echo "click back home <a href='index.php'>home</a>";
?>