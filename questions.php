<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
	<?php
		require('sql_connect.php');
		if(isset($_POST['submit'])) {
			$unticked = 0;
			$a_array = array();
			for($i = 1; $i <= 100; $i++) {
				if(isset($_POST[strval($i)])) {
					array_push($a_array, 1);
				} else {
					array_push($a_array, 0);
					$unticked++;
				}
			}
			$a_str =  implode('', $a_array);
			$u_query = "UPDATE users SET answers='".$a_str."', curr_score=".$unticked." WHERE name='".$_GET['id']."'";
			//echo $u_query;
			$conn->query($u_query);
			header("refresh:0;url=https://matteodimaio.net/rice/rice-purity-leaderboard/index.php");
		}
	?>
</head>
<body>
    <header id="title">Rice Purity\nAnswer Record - <?php echo $_GET['id'] ?></header>
	<div class="main-content">
		<form style="margin: auto; width: 100%; font-size: 20px; margin-top: 40px;" method="post">
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
							echo '<li><input type="checkbox" id="'.$row['id'].'" name="'.$row['id'].'"'.($a_array[$row['id'] - 1] == 1 ? ' checked' : '').'> '.$row["question"].'</li>';
						}
					} else {
						echo "0 results";
					}
				?>
			</ol>
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html>