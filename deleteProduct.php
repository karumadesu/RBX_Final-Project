<?php
    session_start();
    require 'createConnection.php';

    if (isset($_GET['id']))
    {
        $deleteProduct = $_GET['id'];
        $sql = "SELECT * FROM producttable WHERE ID = '$deleteProduct'";
        $result = $conn->query($sql);
        if ($result !== false && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc())
            {
                $plantName = $row['PLANTNAME'];
            }
        }
        $sql = "DELETE FROM producttable WHERE ID = '$deleteProduct'";
        $conn->query($sql);
    }
    $returnUrl = "editProducts.php?error=" . $plantName . " has been removed!";
    header("Location: " . $returnUrl, true, 301);
    exit;
?>