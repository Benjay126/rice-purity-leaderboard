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
    <form id='form' name='form' method="post">
        <label>Enter pin:</label>
        <div>
            <input type="text" pattern="\d*" maxlength=1 id='user-pin-1' name='user-pin-1' oninput='shiftFocus(2, "user")'>
            <input type="text" pattern="\d*" maxlength=1 id='user-pin-2' name='user-pin-2' oninput='shiftFocus(3, "user")'>
            <input type="text" pattern="\d*" maxlength=1 id='user-pin-3' name='user-pin-3' oninput='shiftFocus(4, "user")'>
            <input type="text" pattern="\d*" maxlength=1 id='user-pin-4' name='user-pin-4' oninput='joinPin(4, "user")'>
            <input type="hidden" value="submit" name="btnSubmit">
            <input style='visibility: hidden' type="number" id='total-user-pin' name='total-user-pin'>
            <input style='visibility: hidden' type="text" id='id' name='id'>
        </div>

    </form>
</body>
<script>
    function shiftFocus(num, pinType) { document.getElementById(`${pinType}-pin-${num}`).focus(); }
    function squarePins(numPins, pinType) {
        for (i = 1; i <= numPins; i++) {
            var p = document.getElementById(`${pinType}-pin-${i}`);
            dimDiff = p.offsetWidth - p.offsetHeight;
            p.style.paddingTop = (dimDiff / 2) + 'px';
            p.style.paddingBottom = (dimDiff / 2) + 'px';
        }
    }
    function joinPin(numPins, pinType) {
        const pin = [];
        for (i = 1; i <= numPins; i++) { pin.push(document.getElementById(`${pinType}-pin-${i}`).value); }
        var pinStr = pin.join('');
        document.getElementById(`total-${pinType}-pin`).value = pinStr;
        document.getElementById('form').submit();
    }

    const urlParams = new URLSearchParams(window.location.search);
    var id = urlParams.get('id');
    document.getElementById('id').value = id;
    document.getElementById('user-pin-1').focus();
    window.addEventListener('resize', squarePins(4, "user"));
    squarePins(4, "user");
</script>
</html>
<?php
    if(isset($_POST['btnSubmit'])) {
        $sql = "SELECT * FROM users WHERE name='".$_POST['id']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['pin'] == $_POST['total-pin']) {
                    /*$postVars = array('id', 'total-pin');
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
                    curl_close($ch);*/
                    header("Location: https://matteodimaio.net/rice/rice-purity-leaderboard/questions.php?id=".$_POST['id']);
                } else {
                    echo "Invalid pin";
                }
            }
        } else {
            echo "0 results";
        }
    }
?>