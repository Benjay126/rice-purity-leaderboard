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
            width: 20%;
        }
    </style>
</head>
<body>
    <header>Rice Purity Leaderboard</header>
    <form>
        <label>Enter pin:</label>
        <div>
            <input type="number" id='pin-1' name='pin-1' oninput='shiftFocus(2)'>
            <input type="number" id='pin-2' name='pin-2' oninput='shiftFocus(3)'>
            <input type="number" id='pin-3' name='pin-3' oninput='shiftFocus(4)'>
            <input type="number" id='pin-4' name='pin-4' oninput='submit()'>
        </div>

    </form>
</body>
<script>
    function shiftFocus(num) {
        document.getElementById(`pin-${num}`).focus();
    }
</script>
</html>