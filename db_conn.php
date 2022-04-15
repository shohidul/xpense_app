<?php
    $servername = "remotemysql.com";
    $username = "Tsh8ZBoSbD";
    $password = "hk1wwab51v";
    $dbname = "Tsh8ZBoSbD";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
?>