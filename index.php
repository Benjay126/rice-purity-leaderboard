<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
    <script>
        function redirect() {
            var id = this.children[1].value
            console.log(id);
            window.location.href = `https://matteodimaio.net/rice/rice-purity-leaderboard/user_connect.php?id=${id}`;
        }
    </script>
    <?php require('sql_connect.php'); ?>
</head>
<body>
    <header>Rice Purity Leaderboard</header>
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Init. Score</th>
                <th>Curr. Score</th>
                <th>% Change</th>
            </tr>
        </thead>
        <tbody id="table">
		<?php
			$sql = "SELECT * FROM scores";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
                    $score_change = round((($row['init_score'] / $row['curr_score']) - 1) * 100);
                    echo '<tr onclick="redirect()"><td></td><th>'.strtoupper($row['name']).'</th><th>'.$row['init_score'].'</th><th>'.$row['curr_score'].'</th><th>'.$score_change.'%</td></tr>';
			    }
			} else {
			    echo "0 results";
			}
		?>
        </thead>
    </table>
</body>
</html>