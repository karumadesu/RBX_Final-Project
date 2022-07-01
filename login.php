<?php
     session_start();
     require 'createDatabase.php';
     require 'createUserTable.php'; 
     require 'createProductTable.php';
     require 'createCartTable.php';
     require 'createConnection.php';

     if (isset($_SESSION['activeTest']))
     {
          if ($_SESSION['activeTest'] == 1)
          {
               header("Location: home.php?error=Session still active.");
               exit;
          }
          else if ($_SESSION['activeTest'] == 2)
          {
               header("Location: adminHome.php?error=Session still active.");
               exit;
          }
     }
?>

<!DOCTYPE html>
<html lang = "en">
     <head>
          <meta charset = "UTF-8">
          <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
          <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
          <title> Jangmin's Twiddydinkies </title>
          <link rel = "preconnect" href = "https://fonts.googleapis.com">
          <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
          <link rel = "stylesheet" href = "loginStyle.css">
          <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
          <link rel = "icon" href = "images/favicon.ico" type = "image/icon type">
     </head>
     <body>
          <div class = "header">
               <p class = "headerTitle"> Jangmin's Twiddydinkies </p>
          </div>
          <div class = "elementBox">
               <form action = "databaseCheck.php" method = "POST" autocomplete = "off">
                    <br><br>
                    <input type = "email" name = "loginEmail" placeholder = "Email" class = "loginInput" required 
                         <?php
                              if(isset($_COOKIE['loginEmail']))
                              {
                                   echo "value = \"" . $_COOKIE['loginEmail'] . "\"";
                              }
                         ?>
                    >
                    <br><br>
                    <input type = "password" name = "loginPassword" placeholder = "Password" class = "loginInput" required
                         <?php
                              if(isset($_COOKIE['loginPassword']))
                              {
                                   echo "value = \"" . $_COOKIE['loginPassword'] . "\"";
                              }
                         ?>
                    >
                    <br><br>
                    <div class = "firstContainer">
                         <input type = "checkbox" name = "loginRemember" class = "rememberBox" 
                              <?php
                                   if(isset($_COOKIE['loginRemember']))
                                   {
                                        echo "checked";
                                   }
                              ?>
                         >
                         <label for = "loginRemember" class = "rememberLabel"> Remember Me </label>
                         <input type = "submit" name = "login" value = "Login" class = "loginButton">
                    </div>    
                    <div class = "secondContainer">
                         <a href = "signup.php" class = "signupLink"> Sign Up </a>
                    </div>
               </form>
          </div>
          <br><br>
          <?php
               if(isset($_GET['error']))
               {
                    echo "<div class = \"errorContainer\">";
                    echo "<p class = \"error\">";
                    echo $_GET['error'];
                    echo "</p>";
                    echo "</div>";

                    if($_GET['error'] == "Login Successful! Redirecting...")
                    { 
                         $_SESSION['activeTest'] = 1;
                         header("refresh: 2; url = home.php", true, 301);
                         exit;
                    }
                    elseif($_GET['error'] == "Admin Login! Redirecting...")
                    {
                         $_SESSION['activeTest'] = 2;
                         header("refresh: 2; url = adminHome.php", true, 301);
                         exit;
                    }
               }
          ?>
     </body>
</html>