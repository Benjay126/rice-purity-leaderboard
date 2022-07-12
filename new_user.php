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
    <form id='form' name='form' method="post">
        <label>User </label>
        <div>
            <input type="text" pattern="\d*" maxlength="1" id='id-pin-1' name='pin-1' oninput='shiftFocus(2, "id")'>
            <input type="text" pattern="\d*" maxlength="1" id='id-pin-2' name='pin-2' oninput='shiftFocus(3, "id")'>
            <input type="text" pattern="\d*" maxlength="1" id='id-pin-3' name='pin-3' oninput='joinPin(3, "id")'>
            <input style='visibility: hidden' type="text" id='total-id-pin' name='total-id-pin'>
        </div>
        <div>
            <input type="text" pattern="\d*" maxlength="1" id='user-pin-1' name='pin-1' oninput='shiftFocus(2, "user")'>
            <input type="text" pattern="\d*" maxlength="1" id='user-pin-2' name='pin-2' oninput='shiftFocus(3, "user")'>
            <input type="text" pattern="\d*" maxlength="1" id='user-pin-3' name='pin-3' oninput='shiftFocus(4, "user")'>
            <input type="text" pattern="\d*" maxlength="1" id='user-pin-4' name='pin-4' oninput='joinPin(4, "user")'>
            <input style='visibility: hidden' type="number" id='total-user-pin' name='total-user-pin'>
        </div>
        <div>
            <input type="text" pattern="\d*" maxlength="1" id='admin-pin-1' name='pin-1' oninput='shiftFocus(2, "admin")'>
            <input type="text" pattern="\d*" maxlength="1" id='admin-pin-2' name='pin-2' oninput='shiftFocus(3, "admin")'>
            <input type="text" pattern="\d*" maxlength="1" id='admin-pin-3' name='pin-3' oninput='shiftFocus(4, "admin")'>
            <input type="text" pattern="\d*" maxlength="1" id='admin-pin-4' name='pin-4' oninput='joinPin(4, "admin")'>
            <input style='visibility: hidden' type="number" id='total-admin-pin' name='total-admin-pin'>
        </div>
            <input type="hidden" value="submit" name="btnSubmit">
    </form>
</body>
<script>
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