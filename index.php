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
    <header>
        <a href="https://matteodimaio.net/rice/rice-purity-leaderboard/index.php">Rice Purity Leaderboard</a>
        <a style="float: right" href="https://matteodimaio.net/rice/rice-purity-leaderboard/add_user.php">Add User</a>
    </header>
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
    function numSuffix(num) {
        if (num % 10 == 1 && num != 11) { return 'st'; }
        else if (num % 10 == 2 && num != 12) { return 'nd'; }
        else if (num % 10 == 3 && num != 13) { return 'rd'; }
        else { return 'th'; }
    }

    var sortByChange = function(a, b) {
        var aChange = parseInt(a.children[4].innerText.replace('%', ''));
        var bChange = parseInt(b.children[4].innerText.replace('%', ''));
        return bChange - aChange;
    }
    
    var list = $("#table > tr").get();
    list.sort(sortByChange);
    for (var i = 0; i < list.length; i++) {
        list[i].parentNode.appendChild(list[i]);
    }

    for(i = 0; i < document.getElementById('table').children.length; i++) {
        document.getElementById('table').children[i].children[0].innerText = (i + 1) + numSuffix(i + 1);
        document.getElementById('table').children[i].addEventListener('click', (e) => {
            var id = e.target.parentNode.children[1].innerText;
            window.location.href = `https://matteodimaio.net/rice/rice-purity-leaderboard/user_connect.php?id=${id}`;
        });
    }
</script>
</html>