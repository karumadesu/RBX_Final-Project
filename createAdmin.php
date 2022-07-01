<?php
    require 'createConnection.php';

    $adminName = "admin";
    $adminAddress = "admin";
    $adminContact = "0000";
    $adminEmail = "admin@jangmin.com";
    $adminPassword = "seedcutie";

    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usertable";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) 
    {
        $sql = "INSERT INTO usertable (FULLNAME, HOMEADDRESS, CONTACTNUMBER, EMAIL, PASS)
        VALUES
        (
            '$adminName',
            '$adminAddress',
            '$adminContact',
            '$adminEmail',  
            '$hashedPassword'
        )";

        $conn->query($sql);
    }
?>