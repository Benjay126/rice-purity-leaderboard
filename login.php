<?php
	require('sql_connect.php');
    $sql = "SELECT * FROM users WHERE name=".$_POST['id'];
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['pin'] == $_POST['total-pin']) {
                echo "pin matches";
            }
        }
    } else {
        echo "0 results";
    }
?>