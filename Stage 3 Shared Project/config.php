<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "NAHRIM_schema";
    $conn = mysqli();
    if ($conn -> connenct_error){
        die("connection failed:  ".$conn -> connect_error);
    }
?>
