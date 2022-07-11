<?php
	error_reporting(-1);
	$host = '172.105.173.88';
	$username = 'ben';
	$sql_pw = 'unhinge-naming-whoever-carnation-improving';
	$conn = new mysql($host, $username, $sql_pw);

	$pw = $_POST['total-pin'];
	echo $pw;
	echo 'test';
?>