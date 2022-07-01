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
        <link rel = "stylesheet" href = "userAccountStyle.css">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@300&display=swap">
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
                <a href = "home.php">
                    <span class = "material-icons md-36"> home </span>
                    <p class = "homeText"> Home </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "browse.php">
                    <span class = "material-icons md-36"> shopping_bag </span>
                    <p class = "homeText"> Browse </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "userAccount.php">
                    <span class = "material-icons md-36"> person </span>
                    <p class = "homeText"> My Account </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "cart.php">
                    <span class = "material-icons md-36"> shopping_cart </span>
                    <p class = "homeText"> My Cart </p>
                </a>
                <p class = "homeDivider"> | </p>
                <a href = "homeLogout.php">
                    <span class = "material-icons md-36"> logout </span>
                    <p class = "homeText"> Logout </p>
                </a>
            </div>
        </div>
        <div class = "pageTitle">
            My Account
        </div>
        <div class = "infoContainer">
            <div class = "imageContainer">
                <img class = "userImage" width = "250px" src = "<?php echo $_SESSION['imagePath'] ?>"><br>
            </div>
            <div class = "detailContainer">
                <table>
                    <tr>
                        <td class = "tableLabel">
                            <p class = "detailLabel"> Email </p>
                        </td>
                        <td>
                            <p class = "infoInput"><?php echo $_SESSION['email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class = "tableLabel">
                            <p class = "detailLabel"> Full Name </p>
                        </td>
                        <td>
                            <p class = "infoInput"><?php echo $_SESSION['fullName'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class = "tableLabel">
                            <p class = "detailLabel"> Address </p>
                        </td>
                        <td>
                            <p class = "infoInput"><?php echo $_SESSION['address'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class = "tableLabel">
                            <p class = "detailLabel"> Contact Number </p>
                        </td>
                        <td>
                            <p class = "infoInput"><?php echo "0" . $_SESSION['contactNumber'] ?>
                        </td>
                    </tr> 
                </table>
            </div>
        </div>
        <br><br>
        <div class = "controlButtons">
            <a href = "updateAccount.php"><button type = "button" class = "update"> Update Details </button></a>
            <a href = "changePassword.php"><button type = "button" class = "change"> Change Password </button></a>
        </div>
    </body>
</html>