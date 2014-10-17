<?php
	require_once('connect.php');
	class createnew {
	function selectpost(){
	$sql = "SELECT * FROM `post`,`user` WHERE `post`.`userid`=`user`.`iduser` ORDER BY `dateofpost` DESC LIMIT 4";
	$query= mysql_query($sql);
	if (mysql_num_rows($query)!=0) {
		while ($row=mysql_fetch_array($query)) {
			echo "<div style='height:250px;display:block;overflow:hidden;margin-left:100px;margin-top:20px;'>";
       		echo"<a href='content.php?id=".$row['idpost']."'><img style='float:left;margin-right:10px;' width='350' height='250' src='images/".$row['image']."'></a>";
            echo"<font size='5'><a style='text-decoration:none;color:gold;'href='content.php?id=".$row['idpost']."'>".$row['title']."</a></br>";
            echo"<font size='2' color='gray' text-align:'top'>Ngay Viet : ".$row['dateofpost']."</br>";
            echo"<font size='2' color='gray' text-align:'top'>Nguoi Viet :".$row['username']."</br>";
            echo"</br>";
            echo"<font size='3' color='white' text-align:'top'> ".$row['content'];
            echo "</div>";
		}
	}
	}
	function datetime(){
	$sql = "SELECT * FROM `post`,`user` WHERE `post`.`userid`=`user`.`iduser` ORDER BY `dateofpost`";
	$query= mysql_query($sql);
	if (mysql_num_rows($query)!=0) {
		while ($row=mysql_fetch_array($query)) {
			echo "<ul>";
			echo "<li style='list-style:none'><a style='color:white;text-decoration: none;'href='content.php?id=".$row['idpost']."''>".$row['dateofpost']."</a></li>";
			echo "</ul>";
		}
	}
	}
	function content(){
		$tittle = $_REQUEST['id'];
		$sql= "SELECT * FROM `post` WHERE `idpost`='".$tittle."'";
		$query = mysql_query($sql);
		if(mysql_num_rows($query)!=0){
			while ($row=mysql_fetch_array($query)) {
				echo "<div style='color:white;margin-left:100px;margin-top:20px;>'";
				echo "<h1 style='color:gold;'>".$row['title']."</h1></br>";
				echo "<img src='images/".$row['image']."'></br>";
				echo "<font size='3'>".$row['content']."</br>";
				echo "</div>";
			}
		};
		$sql1 = "SELECT `comment`.`content`,`user`.`username`,`comment`.`dateofcomment` FROM `comment`,`post`,`user` WHERE `comment`.`postid`=`post`.`idpost` and `user`.`iduser`=`comment`.`userid` and `comment`.`postid`='".$tittle."'";
		$query1 = mysql_query($sql1);
		if(mysql_num_rows($query1)!=0)
		{
			printf("<div style='margin-left:100px;'>Comment : </br>");
			while ($row1=mysql_fetch_array($query1)) {
				printf("<table style='width=800px;padding:50px;border:1px solid' margin-left 100px;>
					<tr><td style='color:gray;'>Username:</td><td width ='100px'>".$row1['username']."</td></tr>
					<tr><td style='color:gray;'>Date Comment:</td><td width ='100px'>".$row1['dateofcomment']."</td></tr>
					<tr><td>Comment:</td><td width ='450px'>".$row1['content']."</td></tr>
					</table>");
			}
			printf("</div>");
		}
		if (isset($_SESSION['username'])) {
			printf("<form action='comment.php?id=".$tittle."' method='POST'>
					<table style='width=800px;padding:50px;'>
					<tr><td>Username:</td><td width ='100px'>".$_SESSION['username']."</td></tr>
					<tr><td>Comment:</td><td width ='450px'><textarea style='width:700px;' name='comment' cols='10' rows='10' placeholder='write comment'></textarea></td></tr>
					<tr><td></td><td><input type='submit' name='cm' value='Send'><input type='reset' name='rs' value='clear'></td></tr>
					</table>
				</form>");
		};
	}
	function sessionstar(){
				session_start();
				if(isset($_SESSION['username'])) 
				{
					if($_SESSION['role']=='1'){
						printf("<li><a href=addpost1.php>Add Post</a></li><li><a href=addad.php>Add User</a></li><li><a href=#>Username : %s Role : %s</a></li><li><a href=logout.php>Logout</a></li>",$_SESSION['username'],$_SESSION['rolename']);
					}
					else
					{
						printf("<li><a href=# >Username : %s Role : %s </a></li><li><a href=logout.php>Logout</a></li>",$_SESSION['username'],$_SESSION['rolename']);
					}
				}
				else
				{
					printf("<li><a href=login.php>Login</a></li><li><a href=add.php>Registration</a></li>");
				}
	}
	}
?>