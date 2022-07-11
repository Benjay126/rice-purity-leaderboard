<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL)
    $host = 'localhost:3306';
    $username = 'ben';
    $sql_pw = 'unhinge-naming-whoever-carnation-improving';
    $db = 'rice_purity'
    $conn = mysqli_connect($host, $username, $sql_pw, $db) or die("Unable to connect to '$host'");
?>