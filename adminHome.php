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
        <link rel = "stylesheet" href = "AdminHomeStyle.css">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
        <link rel = "icon" href = "images/favicon.ico" type = "image/icon type">
    </head>
    <body>
        <div class = "header">
            <img src = "images/icon.png" style = "width: 60px; padding-top: 20px; padding-left: 20px; float: left;">
            <p class = "headerTitle"> Jangmin's Twiddydinkies </p>
            <div class = "homeButtons">
                <a href = "homeLogout.php">
                    <span class = "material-icons md-36"> logout </span>
                    <p class = "homeText"> Logout </p>
                </a>
            </div>
        </div>
        <div class = "buttonContainers">
            <a href="viewUsers.php"> 
                <div class = "viewUsers">
                    <img src = "images/usersIcon.jpg" class ="imagebutton">
                    <p> View Users </p>
                </div>
            </a>
            <a href="editProducts.php">
                <div class = "editProducts">
                    <img src = "images/productsIcon.png" class ="imagebutton">
                    <p> Edit Products </p>
                </div>
            </a>
        </div>
        <div class = "errorBox">
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
        </div>
    </body>
</html>