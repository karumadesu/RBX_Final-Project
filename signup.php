<?php
    session_start();

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
          <link rel = "stylesheet" href = "signupStyle.css">
          <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
          <link rel = "icon" href = "images/favicon.ico" type = "image/icon type">
     </head>
     <body>
        <div class = "header">
            <p class = "headerTitle"> Jangmin's Twiddydinkies </p>
        </div>
        <div class = "elementBox">
            <form action = "signup.php" method = "POST" autocomplete = "off">
                <br><br>
                <input type = "text" name = "signupName" placeholder = "Full Name" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['signupName']))
                        {
                            echo "value = \"" . $_SESSION['signupName'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <input type = "text" name = "signupAddress" placeholder = "Address" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['signupAddress']))
                        {
                            echo "value = \"" . $_SESSION['signupAddress'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <input type = "number" name = "signupContact" placeholder = "Contact Number" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['signupContact']))
                        {
                            echo "value = \"" . $_SESSION['signupContact'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <input type = "email" name = "signupEmail" placeholder = "Email" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['signupEmail']))
                        {
                            echo "value = \"" . $_SESSION['signupEmail'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <input type = "password" name = "password" placeholder = "Password" class = "signupInput" required>
                <br><br>
                <input type = "password" name = "confirmPassword" placeholder = "Confirm Password" class = "signupInput" required>
                <br><br>
                <div class = "firstContainer">
                    <a href = "login.php" class = "signupLink"> Return to Login Page </a>
                    <input type = "submit" name = "signup" value = "Sign Up" class = "signupButton">
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
            }

            require 'createConnection.php';

            if(isset($_POST['signup']))
            {
                $fullName = $_POST['signupName'];
                $address = $_POST['signupAddress'];
                $contactNumber = $_POST['signupContact'];
                $email = $_POST['signupEmail'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];

                $_SESSION['signupName'] = $fullName;
                $_SESSION['signupAddress'] = $address;
                $_SESSION['signupContact'] = $contactNumber;
                $_SESSION['signupEmail'] = $email;

                if($password == $confirmPassword)
                {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usertable (FULLNAME, HOMEADDRESS, CONTACTNUMBER, EMAIL, PASS)
                    VALUES ('$fullName', '$address', '$contactNumber', '$email', '$hashedPassword')";

                    $conn->query($sql);
                    session_unset();
                    header("Location: login.php?error=Account Created Successfully!", true, 301);
                    exit;
                }
                else
                {
                    header("Location: signup.php?error=Passwords do not match", true, 301);
                    exit;
                }
            }
        ?>
    </body>
</html>