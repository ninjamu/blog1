<?php
	require_once('connect.php');
	class createnew {
	function selectpost(){
	$sql = "SELECT * FROM `post`,`user` WHERE `post`.`userid`=`user`.`iduser` ORDER BY `dateofpost` DESC LIMIT 3";
	$query= mysql_query($sql);
	if (mysql_num_rows($query)!=0) {
		while ($row=mysql_fetch_array($query)) {
			echo "<div style='height:250px;display:block;overflow:hidden;margin-left:100px;margin-top:20px;'>";
       		echo"<a href='#'><img style='float:left;margin-right:10px;' width='350' height='250' src='images/".$row['image']."'></a>";
            echo"<font size='5'><a style='text-decoration:none;color:gold;'href='#'>".$row['title']."</a></br>";
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
			echo "<li style='list-style:none'><a style='color:white;text-decoration: none;'href='#'>".$row['dateofpost']."</a></li>";
			echo "</ul>";
		}
	}
	}
	function login(){
		
	}
	}
?>