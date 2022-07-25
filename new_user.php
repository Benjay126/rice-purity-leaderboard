<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Rice Purity Leaderboard</title>
    <link rel="stylesheet" href="style.css" />
    <script href="script.js" type="text/javascript"></script>
    <?php require('sql_connect.php'); ?>
    <style>
        form {
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>
    <header>Rice Purity Leaderboard - New User</header>
    <div style="width: 75%;">
        <form id='form' name='form' method="post">
            <div>
                <label>Create Username</label>
                <input type="text" pattern="\d*" maxlength="1" id='id-pin-1' name='pin-1' oninput='shiftFocus(2, "id")'>
                <input type="text" pattern="\d*" maxlength="1" id='id-pin-2' name='pin-2' oninput='shiftFocus(3, "id")'>
                <input type="text" pattern="\d*" maxlength="1" id='id-pin-3' name='pin-3' oninput='joinPin(3, "id", false)'>
                <input style='visibility: hidden' type="text" id='total-id-pin' name='total-id-pin'>
                <br>
            </div>
            <div>
                <label>Create User Pin:</label>
                <input type="text" pattern="\d*" maxlength="1" id='user-pin-1' name='pin-1' oninput='shiftFocus(2, "user")'>
                <input type="text" pattern="\d*" maxlength="1" id='user-pin-2' name='pin-2' oninput='shiftFocus(3, "user")'>
                <input type="text" pattern="\d*" maxlength="1" id='user-pin-3' name='pin-3' oninput='shiftFocus(4, "user")'>
                <input type="text" pattern="\d*" maxlength="1" id='user-pin-4' name='pin-4' oninput='joinPin(4, "user", false)'>
                <input style='visibility: hidden' type="number" id='total-user-pin' name='total-user-pin'>
                <br>
            </div>
            <div>
                <label>Enter Admin Pin:</label>
                <input type="text" pattern="\d*" maxlength="1" id='admin-pin-1' name='pin-1' oninput='shiftFocus(2, "admin")'>
                <input type="text" pattern="\d*" maxlength="1" id='admin-pin-2' name='pin-2' oninput='shiftFocus(3, "admin")'>
                <input type="text" pattern="\d*" maxlength="1" id='admin-pin-3' name='pin-3' oninput='shiftFocus(4, "admin")'>
                <input type="text" pattern="\d*" maxlength="1" id='admin-pin-4' name='pin-4' oninput='joinPin(4, "admin", true)'>
                <input style='visibility: hidden' type="number" id='total-admin-pin' name='total-admin-pin'>
                <br>
            </div>
            <input type="hidden" value="submit" name="btnSubmit">
        </form>
    </div>
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
    function joinPin(numPins, pinType, submit) {
        console.log(submit);
        const pin = [];
        for (i = 1; i <= numPins; i++) { pin.push(document.getElementById(`${pinType}-pin-${i}`).value); }
        var pinStr = pin.join('');
        document.getElementById(`total-${pinType}-pin`).value = pinStr;
        if(submit == false) { document.getElementById('form').submit(); }
    }

    document.getElementById('id-pin-1').focus();
    window.addEventListener('resize', squarePins(3, 'id'));
    window.addEventListener('resize', squarePins(4, 'user'));
    window.addEventListener('resize', squarePins(4, 'admin'));
    squarePins('id');
    squarePins('user');
    squarePins('admin');

</script>
</html>
<?php
    if(isset($_POST['btnSubmit'])) {
        $empty_answers = array();
        for($i = 1; $i <= 100; $i++) {
            array_push($empty_answers, 0);
        }
        $unique_user_sql = "SELECT * FROM users WHERE name='".$_POST['id']."'";
        $add_user_sql = "INSERT INTO users (name, init_score, curr_score, pin, answers) VALUES (".$_POST['total-id-pin'].", -1, -1, ".$_POST['total-user-pin'].", '".implode("", $empty_answers)."')";
        $unique_user = $conn->query($unique_user_sql);
        if ($unique_user->num_rows = 0) {
            $add_user = $conn->query($add_user_sql);
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
            echo "User already added.";
        }
    }
?>