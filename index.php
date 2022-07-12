<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
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
        </thead>
    </table>
</body>
<script>
    var users = [];
	<?php
	    $sql = "SELECT name, init_score, curr_score FROM users";
	    $result = $conn->query($sql);
		if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                users.push({
                     'id': <?php echo $row['id']; ?>,
                     'init_score': <?php echo $row['init_score']; ?>,
                     'curr_score': <?php echo $row['curr_score']; ?>,
                     'score_change': <?php round((($row['init_score'] / $row['curr_score']) - 1) * 100); ?>
                });
		    <?php}
		} else {
		    echo "0 results";
		}
	?>

    var row = echo '<tr><td></td><th></th><th></th><th></th><th>%</td></tr>';
    for(i = 0; i < document.getElementById('table').children.length; i++) {
        document.getElementById('table').children[i].addEventListener('click', (e) => {
            console.log(e.target);
            var id = e.target.parentNode.children[1].innerText;
            window.location.href = `https://matteodimaio.net/rice/rice-purity-leaderboard/user_connect.php?id=${id}`;
        });
    }
</script>
</html>