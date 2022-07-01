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
        <link rel = "stylesheet" href = "changePassword.css">
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
        <div class = "updateTitle">
            Update Information
        </div>
        <form action = "updateDatabasePassword.php" method = "POST" enctype="multipart/form-data" autocomplete = "off">
            <div class = "infoContainer">
                <div class = "imageContainer">
                    <img class = "userImage" src = "<?php echo $_SESSION['imagePath'] ?>"><br>
                    
                </div>
                <div class = "detailContainer">
                    <table>
                        <tr>
                            <td colspan = "2" class = "detailTitle"> Change Password </td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "currentPassword" class = "detailLabel"> Current Password </td>
                            <td><input type = "password" name = "currentPassword" class = "infoInput" required></label></td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "newPassword" class = "detailLabel"> New Password </td>
                            <td><input type = "password" name = "newPassword" class = "infoInput" required></label></td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "confirmPassword" class = "detailLabel"> Confirm Password </td>
                            <td><input type = "password" name = "confirmPassword" class = "infoInput" required></label></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br><br>
            <div class = "controlButtons">
                <input type = "submit" name = "save" class = "save" value = "Save Changes">
                <a href = "userAccount.php"><button type = "button" class = "cancel"> Cancel </button></a>
            </div>
            <br><br>
        </form>
    </body>
</html>