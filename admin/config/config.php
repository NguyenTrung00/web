<?php
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'web_smartphone';

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if($conn->connect_errno){
        echo "Failed to connect to Mysql: " . $conn->connect_error;
        exit();
    }
?>