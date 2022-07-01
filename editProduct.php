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
        <link rel = "stylesheet" href = "editProductStyle.css">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Luckiest+Guy&family=Open+Sans:ital@0;1&display=swap">
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
            Add Products
        </div>
        <?php
            if(isset($_GET['error']))
            {
                echo "<div class = \"errorContainer\">";
                echo "<p class = \"error\">";
                echo $_GET['error'];
                echo "</p>";
                echo "</div>";
            }
        ?>
        <br><br>
        <?php
            require 'createConnection.php';

            $plantId = $_GET['id'];
            $sql = "SELECT * FROM producttable WHERE ID = '$plantId'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $_SESSION['plantImage'] = $row['PLANTIMG'];
                    $_SESSION['plantName'] = $row['PLANTNAME'];
                    $_SESSION['scientificName'] = $row['SCIENTIFICNAME'];
                    $_SESSION['description'] = $row['PLANTDESC'];
                    $_SESSION['price'] = $row['PRICE'];
                }
            }    
            $_SESSION['plantId'] = $plantId;
        ?>
        <form action = "updateProductDatabase.php" method = "POST" enctype="multipart/form-data" autocomplete = "off" id = "editProductForm">
            <div class = "infoContainer">
                <div class = "imageContainer">
                    <img class = "userImage" src = "<?php echo $_SESSION['plantImage'] ?>"><br>
                    <input type = "file" name = "plantImage" class = "uploadImage">
                </div>
                <div class = "detailContainer">
                    <table>
                        <tr>
                            <td colspan = "2" class = "detailTitle"> Product Information </td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "plantName" class = "detailLabel"> Plant Name </td>
                            <td><input type = "text" name = "plantName" class = "infoInput" value = "<?php echo $_SESSION['plantName'] ?>" required></label></td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "scientificName" class = "detailLabel"> Scientific Name </td>
                            <td><input type = "text" name = "scientificName" class = "infoInput" value = "<?php echo $_SESSION['scientificName'] ?>" required></label></td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "price" class = "detailLabel"> Price </td>
                            <td><input type = "number" name = "price" class = "infoInput" value = "<?php echo $_SESSION['price'] ?>" required></label></td>
                        </tr>
                        <tr>
                            <td class = "tableLabel"><label for = "description" class = "detailLabel"> Description </td>
                            <td><textarea form = "editProductForm" name = "description" class = "infoInput" required style = "height: 150px;">
                                <?php echo $_SESSION['description'] ?></textarea></label></td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <br><br>
            <div class = "controlButtons">
                <input type = "submit" name = "save" class = "save" value = "Save Changes">
                <a href = "editProducts.php"><button type = "button" class = "cancel"> Cancel </button></a>
            </div>
            <br><br>
        </form>
    </body>
</html>