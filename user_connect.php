<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
	<?php
		error_reporting(-1);
		$host = 'matteodimaio.net';
		$username = 'ben';
		$sql_pw = 'unhinge-naming-whoever-carnation-improving';
		$conn = mysql_connect($host, $username, $sql_pw) or die("Unable to connect to '$host'");;
	
		$pw = $_POST['total-pin'];
		echo $pw;
		echo 'test';
	?>
    <header id="title">Rice Purity Record - ###</header>
</body>
</html>