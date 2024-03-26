<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nahrim_schema";
    // Connect to the db
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Then check connection (Error handling to help us)
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>
