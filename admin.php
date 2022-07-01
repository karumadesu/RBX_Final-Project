<?php
    session_start();
    if ($_SESSION['activeTest'] == 0)
    {
        header("Location: login.php?error=No Active Session.");
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
        <link rel = "stylesheet" href = "homeStyle.css">
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
            <div class = "HomeButtons">
                <a href = "viewusers.php" class = "homeLink">
                    <span class = "material-icons md-36"> group </span>
                    <p class = "homeText"> View Users </p>
                </a>
            <p class = "homeDivider"> | </p>
                <a href = "homeLogout.php" class = "homeLink">
                    <span class = "material-icons md-36"> logout </span>
                    <p class = "homeText"> Logout </p>
                </a>
            </div>



        </div>
        </body>
</html>