<?php
    session_start();
    if ($_SESSION['activeTest'] != 2)
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
        <link rel = "stylesheet" href = "EditProductsStyle.css">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@300&display=swap">
        <link rel = "icon" href = "images/favicon.ico" type = "image/icon type">
    </head>
    <body>
        <div class = "header">
            <img src = "images/icon.png" style = "width: 60px; padding-top: 20px; padding-left: 20px; float: left;">
            <p class = "headerTitle"> Jangmin's Twiddydinkies </p>
            <div class = "homeButtons">
                <a href = "adminHome.php">
                    <span class = "material-icons md-36"> home </span>
                    <p class = "homeText"> Home </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "homeLogout.php">
                    <span class = "material-icons md-36"> logout </span>
                    <p class = "homeText"> Logout </p>
                </a>
            </div>
        </div>
        <div class = "pageTitle">
            Edit Products
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
 
            require 'createConnection.php';
        
            $sql = "SELECT * FROM producttable";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) 
            {
                echo "<div class = \"buttonContainer\">";
                echo "<a href = \"addProduct.php\">";
                echo "<button type = \"button\" class = \"addButton\">";
                echo "+ Add Products";
                echo "</button>";
                echo "</a>";
                echo "</div>";
                echo "<br>";
                echo "<table class = \"productTable\">";
                echo "<tr>";
                echo "<th class = \"tableHeader\"> Image </th>";
                echo "<th class = \"tableHeader\"> Name </th>";
                echo "<th class = \"tableHeader\"> Scientific Name </th>";
                echo "<th class = \"tableHeader\"> Price </th>";
                echo "<th class = \"tableHeader\"> Description </th>";
                echo "<th class = \"tableHeader\"> Action </th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) 
                {
                    echo "<tr>";	
                    echo "<td><img src =\"$row[PLANTIMG]\" width = \"200px;\" style = \"display: block\"></td>";
                    echo "<td class = \"productInfo\" width = \"150px;\">" . $row['PLANTNAME'] . "</td>";
                    echo "<td class = \"productInfo\" width = \"150px;\">" . $row['SCIENTIFICNAME'] . "</td>";
                    echo "<td class = \"productInfo\" width = \"150px;\"> Php " . $row['PRICE'] . ".00 </td>";
                    echo "<td class = \"productInfo\" width = \"500px;\" style = \"padding-left: 10px; padding-right: 10px;\">" . $row['PLANTDESC'] . "</td>";
                    echo "<td class = \"productInfo\" width = \"150px;\">";
                    echo "<a class = \"edit\" href= \"editProduct.php?id=" . $row['ID'] . "\"> Edit </a><br><br>";
                    echo "<a class = \"delete\" href= \"deleteProduct.php?id=" . $row['ID'] . "\"> Delete </a></td>";
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
