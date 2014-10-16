<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="./js/java.js" ></script>
</head>
<body>
<header>
		<div class="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact</a></li>
				<?php 
				require_once('function.php');
				$menu = new createnew;
				echo $menu->sessionstar();
				?>
			</ul>
		</div>
		<div class="boder"></div>
	</header>
	<div class="add">
	<div class="add1">
	<?php 
	echo "<form name='formadd' action='addpost.php' method='POST'>
	<table>
		<tr><td>Title : </td><td><input type='text' name='tittle' size='25'/></td></tr>
		<tr><td>Content : </td><td><textarea style='width:550px;' name='contentt' rows='20' cols='10'></textarea></td></tr>
		<tr><td>Images : </td><td><input type='file' name='imagess' size='25'/></br></td></tr>
		</select></br></td></tr>
		<tr><td></td><td><input type='submit' name='addsubmit' onclick='return checkpost()'' value='Add' size='25'/>
		<input type='reset' name='resetsub'  value='Clear' size='25'/></td></tr>
	</table>
	</form>
	<script type='text/javascript'>
	function checkpost(){
		if (document.formadd.tittle.value=='') {
			alert('title not null');
			document.formadd.tittle.focus();
			return false;
		};
		if (document.formadd.contentt.value=='') {
			alert('conttentt not null');
			document.formadd.conttentt.focus();
			return false;
		};
		if (document.formadd.imagess.value==''){
			alert('imagess not null');
			document.formadd.imagess.focus();
			return false;
		}
		return true;
	}
	</script>";
	?>
	</div>
	</div>
</body>
</html>
