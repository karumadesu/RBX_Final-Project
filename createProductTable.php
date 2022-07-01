<?php
    require 'createConnection.php';

    $sql = "CREATE TABLE IF NOT EXISTS producttable
    (
        ID INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        PLANTNAME VARCHAR (255) NOT NULL,
        SCIENTIFICNAME VARCHAR (255) NOT NULL,
        PLANTDESC VARCHAR (9999) NOT NULL,
        PRICE NUMERIC (11) NOT NULL,
        PLANTIMG VARCHAR (255) NOT NULL DEFAULT 'images/defaultPlant.png'
    )";

    $conn->query($sql);
    require 'createProducts.php';
    $conn->close();
?>