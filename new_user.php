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
    <header>Rice Purity Leaderboard - New User</header>
    <form id='form' name='form' method="post"></form>
</body>
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