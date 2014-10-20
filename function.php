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
						printf("<li><a href=deleteuser.php>Delete User</a></li><li><a href=delete.php>Delete Post</a></li><li><a href=edituser.php>Edit User</a></li><li><a href=editpost.php>Edit Post</a></li><li><a href=addpost1.php>Add Post</a></li><li><a href=addad.php>Add User</a></li><li><a href=#>Username : %s Role : %s</a></li><li><a href=logout.php>Logout</a></li>",$_SESSION['username'],$_SESSION['rolename']);
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
	function postselect()
	{
		$sql = "SELECT * FROM `post`";
		$query=mysql_query($sql);
		if(mysql_num_rows($query)!=0)
			{
				while ($row=mysql_fetch_array($query)) {
					echo "<option value='".$row['idpost']."'>";
					echo $row['title']."</option>";
				}
				
			}
	}
	function postselectid()
	{
		$edit = $_REQUEST['selectid'];
		$sql= "SELECT * FROM `post` WHERE `idpost`='".$edit."'";
		if(isset($_POST['editad']))
		{
			if($query=mysql_query($sql)){
				while ($row=mysql_fetch_array($query)) {
				echo "<tr style='text-align:center;'>";
				echo "<td><select name='idpost'><option value='".$row['idpost']."'>".$row['idpost']."</option></select></td>";
				echo "<td><input type='text' name='title' value='".$row['title']."'></td>";
				echo "<td>".$row['userid']."</td>";
				echo "<td>".$row['dateofpost']."</td>";
				echo "<td><input type='file' name='image'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=5><textarea name='content' cols='10' rows='10' style='width:550px;'>".$row['content']."</textarea></td>";
				echo "</tr>";
				echo "<tr><td><input type='submit' name='editsub' value='Edit'></td><td><input type='reset' value='clear'></td></tr>";
				echo "<script type='text/javascript'>";
				echo "function checkpost(){
				if (document.formedit.title.value=='') {
					alert('title not null');
					document.formedit.tittle.focus();
					return false;
				};
				if (document.foredit.contentt.value=='') {
					alert('conttentt not null');
					document.formedit.conttentt.focus();
					return false;
				};
				if (document.formedit.image.value==''){
					alert('imagess not null');
					document.formedit.image.focus();
					return false;
				}
				var str=document.formedit.image.value;
				var ext=str.substring(str.length,str.length-3);
				if (ext != 'gif'){
				if (ext != 'PNG'){
				if (ext != 'jpg'){
					alert('Upload file not images');
					document.formedit.image.focus();
					return false;
						}
					}
				}
				return true;
				}";
				echo "</script>";
				}
			
			}
		}
	}
	function deleteselected()
	{
		$edit = $_REQUEST['selectid'];
		$sql= "SELECT * FROM `post` WHERE `idpost`='".$edit."'";
		if(isset($_POST['editad']))
		{
			if($query=mysql_query($sql)){
				while ($row=mysql_fetch_array($query)) {
				echo "<tr style='text-align:center;'>";
				echo "<td><select name='idpost'><option value='".$row['idpost']."'>".$row['idpost']."</option></select></td>";
				echo "<td><input type='text' name='title' value='".$row['title']."'></td>";
				echo "<td>".$row['userid']."</td>";
				echo "<td>".$row['dateofpost']."</td>";
				echo "<td><input type='file' name='image'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=5><textarea name='content' cols='10' rows='10' style='width:550px;'>".$row['content']."</textarea></td>";
				echo "</tr>";
				echo "<tr><td><input type='submit' name='editsub' value='delete'></td><td><input type='reset' value='clear'></td></tr>";
				echo "<script type='text/javascript'>";
				echo "function checkpost(){
				if (document.formedit.title.value=='') {
					alert('title not null');
					document.formedit.tittle.focus();
					return false;
				};
				if (document.foredit.contentt.value=='') {
					alert('conttentt not null');
					document.formedit.conttentt.focus();
					return false;
				};
				if (document.formedit.image.value==''){
					alert('imagess not null');
					document.formedit.image.focus();
					return false;
				}
				var str=document.formedit.image.value;
				var ext=str.substring(str.length,str.length-3);
				if (ext != 'gif'){
				if (ext != 'PNG'){
				if (ext != 'jpg'){
					alert('Upload file not images');
					document.formedit.image.focus();
					return false;
						}
					}
				}
				return true;
				}";
				echo "</script>";
				}
			
			}
		}
	}
	function userselect()
	{
		$sql = "SELECT * FROM `user`";
		$query=mysql_query($sql);
		if(mysql_num_rows($query)!=0)
			{
				while ($row=mysql_fetch_array($query)) {
					echo "<option value='".$row['iduser']."'>";
					echo $row['username']."</option>";
				}
				
			}
	}
	function userselectid()
	{
		$edit = $_REQUEST['selectid'];
		$sql= "SELECT * FROM `user` WHERE `iduser`='".$edit."'";
		if(isset($_POST['editad']))
		{
			if($query=mysql_query($sql)){
				while ($row=mysql_fetch_array($query)) {
				echo "<tr style='text-align:center;'>";
				echo "<td><select name='iduser'><option value='".$row['iduser']."'>".$row['iduser']."</option></select></td>";
				echo "<td><input type='text' name='username' style='width:100px;' name='title' value='".$row['username']."'></td>";
				echo "<td><input type='text' name='password' style='width:50px;'name='title' value='".$row['password']."'></td>";
				echo "<td><input type='text' name='email' style='width:200px;'name='title' value='".$row['email']."'></td>";
				echo "<td><input type='text' name='firstname' style='width:50px;'name='title' value='".$row['firstname']."'></td>";
				echo "<td><input type='text' name='lastname' style='width:50px;'name='title' value='".$row['lastname']."'></td>";
				echo "<td><input type='text' name='idrole' style='width:50px;'name='title' value='".$row['idrole']."'></td>";
				echo "</tr>";
				echo "<tr><td><input type='submit' name='editsub' value='Edit'></td><td><input type='reset' value='clear'></td></tr>";
				}
			
			}
		}
	}
	function deleteselectid()
	{
		$edit = $_REQUEST['selectid'];
		$sql= "SELECT * FROM `user` WHERE `iduser`='".$edit."'";
		if(isset($_POST['editad']))
		{
			if($query=mysql_query($sql)){
				while ($row=mysql_fetch_array($query)) {
				echo "<tr style='text-align:center;'>";
				echo "<td><select name='iduser'><option value='".$row['iduser']."'>".$row['iduser']."</option></select></td>";
				echo "<td><input type='text' name='username' style='width:100px;' name='title' value='".$row['username']."'></td>";
				echo "<td><input type='text' name='password' style='width:50px;'name='title' value='".$row['password']."'></td>";
				echo "<td><input type='text' name='email' style='width:200px;'name='title' value='".$row['email']."'></td>";
				echo "<td><input type='text' name='firstname' style='width:50px;'name='title' value='".$row['firstname']."'></td>";
				echo "<td><input type='text' name='lastname' style='width:50px;'name='title' value='".$row['lastname']."'></td>";
				echo "<td><input type='text' name='idrole' style='width:50px;'name='title' value='".$row['idrole']."'></td>";
				echo "</tr>";
				echo "<tr><td><input type='submit' name='editsub' value='Delete'></td><td><input type='reset' value='clear'></td></tr>";
				}
			
			}
		}
	}
	}
?>