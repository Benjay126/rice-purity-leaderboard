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
    <form method="post">
        <label>Enter pin:</label>
        <div>
            <input type="number" id='pin-1' name='pin-1' oninput='shiftFocus(2)'>
            <input type="number" id='pin-2' name='pin-2' oninput='shiftFocus(3)'>
            <input type="number" id='pin-3' name='pin-3' oninput='shiftFocus(4)'>
            <input type="number" id='pin-4' name='pin-4' oninput='joinPin()'>
            <input type="submit" name="submit">
            <input style='visibility: hidden' type="number" id='total-pin' name='total-pin'>
            <input style='visibility: hidden' type="text" id='id' name='id'>
        </div>

    </form>
</body>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    document.getElementById('id').value = id;
    document.getElementById('pin-1').focus();

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
<?php
    if(isset($_POST['submit'])) {
        $sql = "SELECT * FROM users WHERE name='".$_POST['id']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['pin'] == $_POST['total-pin']) {
                    $postVars = array('id', 'total-pin');
                    $postData = array();
                    
                    foreach($postVars as $name){
                        if(isset($_POST[$name])){
                            $postData[$name] = $_POST[$name];
                        }
                    }
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://matteodimaio.net/rice/rice-purity-leaderboard/questions.php");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
                } else {
                    echo "Invalid pin";
                }
            }
        } else {
            echo "0 results";
        }
    }
?>