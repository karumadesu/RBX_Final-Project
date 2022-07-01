<?php
    session_start();
    require 'createConnection.php';

    if (isset($_GET['id']))
    {
        $addedToCart = $_GET['id'];
        $sql = "SELECT * FROM producttable WHERE ID = '$addedToCart'";
        $result = $conn->query($sql);
        if ($result !== false && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc())
            {
                $plantName = $row['PLANTNAME'];
            }
        }

        $sql = "SELECT * FROM carttable WHERE PLANTNAME = '$plantName'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0)
        {
            $sql = "INSERT INTO carttable (ID, PLANTNAME, QUANTITY) VALUES ('$addedToCart', '$plantName', '1')";
            $conn->query($sql);
        }
        else
        {
            if ($result !== false && $result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc())
                {
                    $quantity = $row['QUANTITY'];
                    $quantity += 1;

                    $plantName = $row['PLANTNAME'];
                }
            }
            $sql = "UPDATE carttable SET QUANTITY = '$quantity' WHERE PLANTNAME = '$plantName'";
            $conn->query($sql);
        }
        $returnUrl = "browse.php?cart=" . $plantName;
    }
    header("Location: " . $returnUrl, true, 301);
    exit;
?>