<?php
    require 'createConnection.php';
    
    $sql = "DROP TABLE carttable";
    $conn->query($sql);

    require 'createCartTable.php';

    header("Location: cart.php?prompt=Purchase Success!", true, 301);
?>
