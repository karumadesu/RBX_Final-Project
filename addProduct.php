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
        <link rel = "stylesheet" href = "addProductStyle.css">
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
        <div class = "elementBox">
            <form action = "addProduct.php" method = "POST" enctype="multipart/form-data" autocomplete = "off" id = "addForm">
                <?php
                    echo "<img src = \"";
                    if (isset($_SESSION['plantImage']))
                    {
                        echo $_SESSION['plantImage'];
                    }
                    else
                    {
                        echo "images/defaultPlant.png";
                    }
                    echo "\" width = \"250px;\" style = \"border: 3px solid #013220; margin-top: 20px;\">";
                ?>
                <input type = "file" name = "plantImage" class = "addInput">
                <br><br>
                <input type = "text" name = "plantName" placeholder = "Plant Name" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['plantName']))
                        {
                            echo "value = \"" . $_SESSION['plantName'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <input type = "text" name = "scientificName" placeholder = "Scientific Name" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['scientificName']))
                        {
                            echo "value = \"" . $_SESSION['scientificName'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <input type = "number" name = "price" placeholder = "Price" class = "signupInput" required
                    <?php
                        if (!empty($_SESSION['price']))
                        {
                            echo "value = \"" . $_SESSION['price'] . "\"";
                        }
                    ?>
                >
                <br><br>
                <textarea name = "description" form = "addForm" class = "descriptionField" placeholder = "Description"></textarea>
                <br><br>
                <div class = "firstContainer">
                    <a href = "editProducts.php" class = "signupLink"> Return to Edit Page </a>
                    <input type = "submit" name = "add" value = "Add Product" class = "signupButton">
                </div>    
            </form>
        </div>
        <?php
            require 'createConnection.php';

            if(isset($_POST['add']))
            {
                $plantName = $_POST['plantName'];
                $scientificName = $_POST['scientificName'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $plantImage = $_POST['plantImage'];

                $_SESSION['plantName'] = $plantName;
                $_SESSION['scientificName'] = $scientificName;
                $_SESSION['price'] = $price;
                $_SESSION['description'] = $description;
                $_SESSION['plantImage'] = $plantImage;

                if (isset($_FILES['plantImage']))
                {
                    $imageName = $_FILES['plantImage']['name'];
                    $imageSize = $_FILES['plantImage']['size'];
                    $imagePath = $_FILES['plantImage']['tmp_name'];
                    $imageError = $_FILES['plantImage']['error'];

                    if ($imageError === 0)
                    {
                        if ($imageSize > 125000)
                        {
                            header("Location: addProduct.php?error=Uploaded file is too large", true, 301);
                            exit;
                        }
                        else
                        {
                            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                            $imageExtensionLower = strtolower($imageExtension);

                            $allowedImageExtensions = array("jpg", "jpeg", "png");

                            if (in_array($imageExtensionLower, $allowedImageExtensions))
                            {
                                $imageFileName = "product-" . $plantName;
                                $imageUploadPath = "images/" . $imageFileName;
                                move_uploaded_file($imagePath, $imageUploadPath);
                            }
                            else
                            {
                                header("Location: addProduct.php?error=Invalid file format", true, 301);
                                exit;
                            }
                        }
                    }
                    else
                    {
                        $imageUploadPath = "images/defaultPlant.png";
                    }
                }
                else
                {
                    $imageUploadPath = "images/defaultPlant.png";
                }

                $_SESSION['plantImage'] = $imageUploadPath;
                
                $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE, PLANTIMG)
                VALUES
                (
                    '$plantName',
                    '$scientificName',
                    '$description',
                    '$price',
                    '$imageUploadPath'
                )";
                $conn->query($sql);
                
                header("Location: addProduct.php?error=Plant Successfully Added!", true, 301);
                exit;
            }
        ?>
        <br><br>
    </body>
</html>
