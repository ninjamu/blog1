<?php 
$host ="localhost";
$root = "root";
$pass ="";
$database = "blog";
$conn=mysql_connect($host,$root,$pass) or die('cannot connection');
mysql_select_db($database,$conn) or die('cannot database');
?>
