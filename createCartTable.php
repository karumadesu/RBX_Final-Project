<?php
    require 'createConnection.php';

    $sql = "CREATE TABLE IF NOT EXISTS carttable
    (
        ID INT (6) UNSIGNED PRIMARY KEY,
        PLANTNAME VARCHAR (255) NOT NULL,
        QUANTITY NUMERIC (11) NOT NULL
    )";
    
    $conn->query($sql);
    require 'createAdmin.php';
    $conn->close();
?>