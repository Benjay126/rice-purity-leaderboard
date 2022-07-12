<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php require('sql_connect.php'); ?>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header id="title">Rice Purity Record - <?php echo $_GET['id'] ?></header>
	<form style="margin: auto; width: 100%; font-size: 20px; margin-top: 40px;" action="user_connect.php" method="post">
		<ol>
			<?php
				$a_query = "SELECT answers FROM users WHERE name='".$_GET['id']."'";
				$a_result = $conn->query($a_query);

				$q_query = "SELECT * FROM questions";
				$q_result = $conn->query($q_query);
				
				if ($q_result->num_rows > 0 and $a_result->num_rows > 0) {
					$answer = $a_result->fetch_assoc();
					$a_array = str_split($answer['answers']);
					while($row = $q_result->fetch_assoc()) {
						//echo ($a_array[$row['id']] == 1 ? 'checked' : 'none');
						echo '<li><input type="checkbox" id='.$row['id'].($a_array[$row['id'] - 1] == 1 ? 'checked' : '').'> '.$row["question"].'</li>';
					}
				} else {
					echo "0 results";
				}
			?>
		</ol>
		<input type="submit">
    </form>
	</div>
	
</body>
<?php
	$conn->close();
?>
</html>