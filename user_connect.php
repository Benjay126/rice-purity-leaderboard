<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
    <?php require('sql_connect.php'); ?>
    <style>
        form {
            width: 50%;
            margin: auto;
        }

        input[type=number] {

        }
    </style>
</head>
<body>
    <header>Rice Purity Leaderboard</header>
    <form>
        <label>Enter pin:</label>
        <input type="number" id='pin-1' name='pin-1'>
        <input type="number" id='pin-2' name='pin-2'>
        <input type="number" id='pin-3' name='pin-3'>
        <input type="number" id='pin-4' name='pin-4'>
    </form>
</body>
</html>