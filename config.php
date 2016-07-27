<?php
$mysqli = new mysqli("127.0.0.1", "root", "mejia123", "Aerial_database");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $mysqli2 = new mysqli("127.0.0.1", "root", "mejia123", "Aerial_database");
    if ($mysqli2->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli2->connect_error;
    }
    $mysqli3 = new mysqli("127.0.0.1", "root", "mejia123", "Aerial_database");
    if ($mysqli3->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli3->connect_error;
    }
?>
