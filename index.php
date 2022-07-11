<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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
    </table>
</body>
</html>