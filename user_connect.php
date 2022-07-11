<?php
	$host = '172.105.173.88';
	$username = 'ben';
	$sql_pw = 'unhinge-naming-whoever-carnation-improving';
	$conn = new mysql($host, $username, $pw);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";

	$pw = $_POST['total-pin'];
	echo $pw;
	echo 'test';
?>