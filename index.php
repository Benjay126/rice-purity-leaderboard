<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL)
    require('sql_connect.php');  
    ?>
</head>
<body>
    <header>Rice Purity Leaderboard</header>
    <table id="table">
        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Init. Score</th>
            <th>Curr. Score</th>
            <th>% Change</th>
        </tr>
		<?php
			$sql = "SELECT * FROM scores";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
                    $score_change = round((($row['init_score'] / $row['curr_score']) - 1) * 100);
                    echo '<tr><td></td><th>'.$row['name'].'</th><th>'.$row['init_score'].'</th><th>'.$row['curr_score'].'</th><th>'.$score_change.'%</td></tr>';
			    }
			} else {
			    echo "0 results";
			}
		?>
    </table>
</body>
<script type="text/javascript" src="script.js"></script>
</html>