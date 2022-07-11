<?php
	error_reporting(-1);
	$host = '172.105.173.88';
	$username = 'ben';
	$sql_pw = 'unhinge-naming-whoever-carnation-improving';
	$conn = mysql_connect($host, $username, $sql_pw) or die("Unable to connect to '$host'");;

	$pw = $_POST['total-pin'];
	echo $pw;
	echo 'test';
?>