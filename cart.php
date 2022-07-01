<?php
    session_start();
    if ($_SESSION['activeTest'] != 1)
    {
        header("Location: login.php?error=Invalid Session.");
        exit;
    }
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title> Jangmin's Twiddydinkies </title> 
        <link rel = "preconnect" href = "https://fonts.googleapis.com">
        <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
        <link rel = "stylesheet" href = "CartStyle.css">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
        <link rel = "icon" href = "images/favicon.ico" type = "image/icon type">
    </head>
    <body>
        <div class = "header">
            <div class = "logo">
                <img src = "images/icon.png" style = "width: 80px; padding-top: 30px; padding-left: 20px; float: left;">
            </div>
            <div class = "homeTitle">
                Jangmin's Twiddydinkies
            </div>
            <div class = "homeButtons">
                <a href = "home.php" class = "homeLink">
                    <span class = "material-icons md-36"> home </span>
                    <p class = "homeText"> Home </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "browse.php" class = "homeLink">
                    <span class = "material-icons md-36"> shopping_bag </span>
                    <p class = "homeText"> Browse </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "userAccount.php" class = "homeLink">
                    <span class = "material-icons md-36"> person </span>
                    <p class = "homeText"> My Account </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "cart.php" class = "homeLink">
                    <span class = "material-icons md-36"> shopping_cart </span>
                    <p class = "homeText"> My Cart </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "homeLogout.php" class = "homeLink">
                    <span class = "material-icons md-36"> logout </span>
                    <p class = "homeText"> Logout </p>
                </a>
            </div>
        </div>
        <?php 
            if(isset($_GET['prompt']))
            {
                echo "<div class = \"errorContainer\">";
                echo "<p class = \"error\">";
                echo $_GET['prompt'];
                echo "</p>";
                echo "</div>";
                echo "<br><br>";
            }

            require 'createConnection.php';

            $sql = "SELECT * FROM carttable WHERE QUANTITY = '0'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()) 
                {
                    $sql = "DELETE FROM carttable";
                    $conn->query($sql);
                }
            }

            $sql = "SELECT product.PLANTIMG, product.PLANTNAME, product.PRICE, product.ID, cart.PLANTNAME, cart.QUANTITY, cart.ID
            FROM carttable cart, producttable product
            WHERE product.PLANTNAME = cart.PLANTNAME";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                echo "<div class = \"cartContainer\">";
                echo "<table>";
                echo "<th class = \"cartTitle\"> Items in Your Bag </th>";
                echo "<tr style = \"font-weight: bold\">";
                echo "<td colspan = \"2\" style = \"text-align: center;\" class = \"cartLabel\"> Item </td>";
                echo "<td class = \"cartLabel\"> Price </td>";
                echo "<td class = \"cartLabel\"> Quantity </td>";
                echo "<td class = \"cartLabel\"> Subtotal </td>";
                echo "</tr>";

                if (isset($_SESSION['total']))
                {
                    unset($_SESSION['total']);
                }
                else
                {
                    $_SESSION['total'] = '0';
                }
                
                while($row = $result->fetch_assoc()) 
                { 
                    echo "<tr>";
                    echo "<td class =\"cartImage\">";
                    echo "<img src = \"" . $row['PLANTIMG'] . "\" width = \"100px\">";
                    echo "</td>";
                    echo "<td class =\"cartDetails\">" . $row['PLANTNAME'] . "</td>";
                    echo "<td class =\"cartDetails\">" . $row['PRICE'] . "</td>";
                    echo "<td class =\"cartDetails\">" . $row['QUANTITY'] . "</td>";
                    echo "<td class =\"cartDetails\">" . ($row['PRICE'] * $row['QUANTITY']) . "</td> ";
                    echo "<td> <a href = \"remove.php?id=" . $row['ID'] . "\" class = \"removeItem\"> Remove </a></td>";

                    if (isset($_SESSION['total']))
                    {
                        $_SESSION['total'] += ($row['PRICE'] * $row['QUANTITY']);
                    }
                    else
                    {
                        $_SESSION['total'] = ($row['PRICE'] * $row['QUANTITY']);
                    }
                }
                echo "</table><br>";
                echo "<div class = \"cartInfo\">";
                echo "Total:<b>Php " . $_SESSION['total'] . ".00</b><br>";
                echo "Shipping Fee: <b>FREE</b><br><br>";
                echo "<a href =\"checkout.php\"><button type = \"button\" class = \"checkout\"> Check Out </button></a>";
                echo "</div>";
                unset($_SESSION['total']);
            }
            else 
            {
                echo "<div class = \"errorContainer\">";
                echo "<p class = \"error\">";
                echo "No items in cart";
                echo "</p>";
                echo "</div>";
                echo "<br><br>";
            }
        ?>
    </body>
</html>