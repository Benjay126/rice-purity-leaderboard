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

		$host = 'localhost:3306';
		$username = 'ben';
		$sql_pw = 'unhinge-naming-whoever-carnation-improving';
		$db = 'rice_purity';

		$conn = mysqli_connect($host, $username, $sql_pw, $db) or die("Unable to connect to '$host'");
	
		$sql = "SELECT * FROM questions";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    echo "id: " . $row["id"]. " - question: " . $row["question"];
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();

		$pw = $_POST['total-pin'];
		echo $pw;
	?>
	<?php
		echo $pw;
	?>
</body>
</html>