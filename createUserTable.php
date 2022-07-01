<?php
    require 'createConnection.php';

    $sql = "CREATE TABLE IF NOT EXISTS usertable
    (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FULLNAME VARCHAR (255) NOT NULL,
        HOMEADDRESS VARCHAR (255) NOT NULL,
        CONTACTNUMBER NUMERIC (11) NOT NULL,
        EMAIL VARCHAR (255) NOT NULL,
        PASS VARCHAR (255) NOT NULL,
        IMGPATH VARCHAR (255) DEFAULT 'images/defaultUser.png'
    )";

    $conn->query($sql);
    require 'createAdmin.php';
    $conn->close();
?>