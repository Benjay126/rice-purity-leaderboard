<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header id="title">Rice Purity Record - ###</header>
	<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$host = 'matteodimaio.net';
		$username = 'ben';
		$sql_pw = 'unhinge-naming-whoever-carnation-improving';

		//$conn = mysql_connect($host, $username, $sql_pw) or die("Unable to connect to '$host'");
	
		$pw = $_POST['total-pin'];
		echo $name;
		echo $pw;
	?>
</body>
</html>