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
        <link rel = "stylesheet" href = "browseStyle.css">
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
               if(isset($_GET['error']))
               {
                    echo "<div class = \"errorContainer\">";
                    echo "<p class = \"error\">";
                    echo $_GET['error'];
                    echo "</p>";
                    echo "</div>";
                    echo "<br><br>";
               }
        ?>
        <p class = "productsTitle">
            product catalog
        </p>
        <?php 
            if (isset($_GET['cart']))
            {
                echo "<div class = \"cartContainer\">";
                echo "<p class = \"cart\">";
                echo $_GET['cart'] . " has been added to cart!";
                echo "</p>";
                echo "</div>";
                echo "<br><br>";
            }
            
            require 'createConnection.php';
		  
            $sql = "SELECT * FROM producttable";
            $result = $conn->query($sql);

            if ($result->num_rows != 0) 
            {
                echo "<table>";
                echo "<tr>";
                echo "<th> Image </th>";
                echo "<th> ID </th>";
                echo "<th> Name </th>";
                echo "<th> Scientific Name </th>";
                echo "<th> Description </th>";
                echo "<th> Price </th>";
                echo "<th> Action </th>";
                echo "</tr>";

                while($row = $result->fetch_assoc()) 
                {     
                    echo "<tr>";	
                    echo "<td><img src=\"" . $row['PLANTIMG'] . "\" width = \"150px\" style = \"vertical-align: bottom;\"></td>";
                    echo "<td width = \"100px\">" . $row['ID']."</td> ";
                    echo "<td width = \"150px\" style = \"font-weight: bold;\">" . $row['PLANTNAME']."</td> ";
                    echo "<td width = \"150px\" style = \"font-style: italic;\">" . $row['SCIENTIFICNAME']."</td> ";
                    echo "<td width = \"500px\" style = \"font-size: 16px;\">" . $row['PLANTDESC']."</td>";
                    echo "<td width = \"100px\">" . $row['PRICE']."</td>";  
                    echo "<td width = \"100px\"> <a href = \"addToCart.php?id=" . $row['ID'] . "\" class = \"add\"> Add to Cart </a></td>";  
                    echo "</tr>";
                }
                echo "</table>";
            }
            else 
            {
                echo "<div class = \"errorContainer\">";
                echo "<p class = \"error\">";
                echo "No products found!";
                echo "</p>";
                echo "</div>";
                echo "<br><br>";
            }
        ?>
        <br><br>
    </body>
</html>