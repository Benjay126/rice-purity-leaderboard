<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <?php require('sql_connect.php');  ?>
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
	        $sql = "SELECT name, init_score, curr_score FROM users";
	        $result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
                    $score_change = round((($row['init_score'] / $row['curr_score']) - 1) * 100);
                    echo '<tr><td></td><th>'.strtoupper($row['name']).'</th><th>'.$row['init_score'].'</th><th>'.$row['curr_score'].'</th><th>'.$score_change.'%</td></tr>';
			    }
			} else {
			    echo "0 results";
			}
		?>
        </thead>
    </table>
</body>
<script>
    var sortByChange = function(a, b) {
        return parseInt(a.children[4].innerText.replace('%', '')).localeCompare(parseInt(b.children[4].innerText.replace('%', '')));
    }
    
    var list = $("#table > tr").get();
    list.sort(sortByChange);
    for (var i = 0; i < list.length; i++) {
        list[i].parentNode.appendChild(list[i]);
    }

    for(i = 0; i < document.getElementById('table').children.length; i++) {
        document.getElementById('table').children[i].addEventListener('click', (e) => {
            var id = e.target.parentNode.children[1].innerText;
            window.location.href = `https://matteodimaio.net/rice/rice-purity-leaderboard/user_connect.php?id=${id}`;
        });
    }
</script>
</html>