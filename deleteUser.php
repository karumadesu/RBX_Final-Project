<?php
    session_start();
    require 'createConnection.php';

    if (isset($_GET['id']))
    {
        $deleteUser = $_GET['id'];
        $sql = "SELECT FULLNAME FROM usertable WHERE ID = '$deleteUser'";
        $result = $conn->query($sql);
        if ($result !== false && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc())
            {
                $fullName = $row['FULLNAME'];
            }
        }
        $returnUrl = "viewUsers.php?removed=" . $fullName;
        $sql = "DELETE FROM usertable WHERE ID = '$deleteUser'";
        $conn->query($sql);
    }
    header("Location: " . $returnUrl, true, 301);
    exit;
?>