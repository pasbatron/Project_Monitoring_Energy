<?php
    $servername = "localhost";
    $username = "wanda";
    $password = "raspberrypi";
    $dbname = "database_tps_energy";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
