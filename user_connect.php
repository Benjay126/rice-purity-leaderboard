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
    </style>
</head>
<body>
    <header>Rice Purity Leaderboard</header>
    <form action="login.php" method="post">
        <label>Enter pin:</label>
        <div>
            <input type="number" id='pin-1' name='pin-1' oninput='shiftFocus(2)'>
            <input type="number" id='pin-2' name='pin-2' oninput='shiftFocus(3)'>
            <input type="number" id='pin-3' name='pin-3' oninput='shiftFocus(4)'>
            <input type="number" id='pin-4' name='pin-4' oninput='joinPin()'>
            <input type="submit">
            <input style='visibility: hidden' type="number" id='total-pin' name='total-pin'>
            <input style='visibility: hidden' type="text" id='id' name='id'>
        </div>

    </form>
</body>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    document.getElementById('id').value = id;

    function shiftFocus(num) {
        document.getElementById(`pin-${num}`).focus();
    }

    function joinPin() {
        const pin = [
            document.getElementById('pin-1').value,
            document.getElementById('pin-2').value,
            document.getElementById('pin-3').value,
            document.getElementById('pin-4').value
        ];
        var pinStr = pin.join('');
        document.getElementById('total-pin').value = pinStr;
    }
</script>
</html>