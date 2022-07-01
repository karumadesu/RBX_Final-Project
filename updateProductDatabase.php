<?php
    session_start();
    require 'createConnection.php';

    if(isset($_POST['save']))
    {
        $plantName = $_POST['plantName'];
        $scientificName = $_POST['scientificName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
         
        $_SESSION['plantName'] = $plantName;
        $_SESSION['scientificName'] = $scientificName;
        $_SESSION['price'] = $price;
        $_SESSION['description'] = $description;
        
        $plantId =  $_SESSION['plantId'];

        if (!empty($_FILES['plantImage']))
        {
            $imageName = $_FILES['plantImage']['name'];
            $imageSize = $_FILES['plantImage']['size'];
            $imagePath = $_FILES['plantImage']['tmp_name'];
            $imageError = $_FILES['plantImage']['error'];

            if ($imageError === 0)
            {
                if ($imageSize > 125000)
                {
                    header("Location: editProduct.php?error=Uploaded file is too large", true, 301);
                    exit;
                }
                else
                {
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imageExtensionLower = strtolower($imageExtension);

                    $allowedImageExtensions = array("jpg", "jpeg", "png");

                    if (in_array($imageExtensionLower, $allowedImageExtensions))
                    {
                        $imageFileName = "product-" . $plantId;
                        $imageUploadPath = "images/" . $imageFileName;
                        move_uploaded_file($imagePath, $imageUploadPath);
                    }
                    else
                    {
                        header("Location: editProduct.php?error=Invalid file format", true, 301);
                        exit;
                    }
                }
            }
        }
        else
        {
            $imageUploadPath = "images/defaultPlant.png";
        }
                
        $_SESSION['plantImage'] = $imageUploadPath;
        $sql = "SELECT * FROM producttable WHERE ID = '$plantId'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) 
        {
            if ($imageName == '' || $imageName == NULL)
            {
                $sql = "UPDATE producttable SET 
                PLANTNAME = '$plantName', 
                SCIENTIFICNAME = '$scientificName', 
                PLANTDESC = '$description', 
                PRICE = '$price'
                WHERE ID = '$plantId'";
    
                $conn->query($sql);
            }
            else
            {
                $sql = "UPDATE producttable SET 
                PLANTNAME = '$plantName', 
                SCIENTIFICNAME = '$scientificName', 
                PLANTDESC = '$description', 
                PRICE = '$price',
                PLANTIMG = '$imageUploadPath'
                WHERE ID = '$plantId'";
    
                $conn->query($sql);
            }
        }
        $url = "editProduct.php?error=Plant Successfully Updated!&id=" . $plantId;
        header("Location: " . $url, true, 301);
        exit;
    }
?>