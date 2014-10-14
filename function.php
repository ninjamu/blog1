<?php
	require_once('connect.php');
	$sql = "SELECT * FROM `post`,`user` WHERE `post`.`userid`=`user`.`iduser` ORDER BY `dateofpost` DESC LIMIT 3";
	$query= mysql_query($sql);
	if (mysql_num_rows($query)!=0) {
		echo"<Table border=0 height='200' width='100%' margin-left='100px'>";
		while ($row=mysql_fetch_array($query)) {
			echo"<tr>";
       		echo"<td colspan='2' align='left'><img width='350' height='250' src='images/".$row['image']."'></td>";
            echo"<td width='450px' text-align='top'><font size='3' color='white' margin-top='-50px'><h3>".$row['title']."</h3></br>
            <font size='3' color='white' text-align:'top'>Ngay Viet : ".$row['dateofpost']."</br>
            <font size='3' color='white' text-align:'top'>Nguoi Viet : ".$row['username']."</font></td>";
            echo"</tr>";
		}
		echo "</Table>";
	}
	
?>