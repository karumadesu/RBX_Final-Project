<?php
    session_start();
    require 'createConnection.php';

    if (isset($_GET['id']))
    {
        $removePlant = $_GET['id'];
        $sql = "SELECT * FROM carttable WHERE ID = '$removePlant'";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc())
            {
                $quantity = $row['QUANTITY'];
                if ($quantity > 0)
                {
                    $quantity -= 1;
                    if ($quantity == 0)
                    {
                        $sql = "DELETE FROM carttable WHERE ID = $removePlant";
                        $conn->query($sql);
                    }
                    else
                    {
                        $sql = "UPDATE carttable SET QUANTITY = '$quantity' WHERE ID = $removePlant";
                        $conn->query($sql);
                    }
                }
                else
                {
                    $sql = "DELETE FROM carttable WHERE ID = $removePlant";
                    $conn->query($sql);
                }
            }
        }
    }
    header("Location: cart.php", true, 301);
    exit;
?>