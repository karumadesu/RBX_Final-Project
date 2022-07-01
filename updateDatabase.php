<?php
    session_start();
    require 'createConnection.php';

    if(isset($_POST['save']))
    {
        $fullName = $_POST['fullName'];
        $address = $_POST['address'];
        $contactNumber = $_POST['contactNumber'];
        $email = $_POST['email'];

        $currentEmail = $_SESSION['email'];
        $password = $_SESSION['password'];
        $userId = $_SESSION['userId'];

        $currentPassword = $_POST['currentPassword'];
        $confirmPassword = $_POST['confirmPassword'];
         
        if (!empty($_FILES['uploadImage']))
        {
            $imageName = $_FILES['uploadImage']['name'];
            $imageSize = $_FILES['uploadImage']['size'];
            $imagePath = $_FILES['uploadImage']['tmp_name'];
            $imageError = $_FILES['uploadImage']['error'];

            if ($imageError === 0)
            {
                if ($imageSize > 125000)
                {
                    header("Location: updateAccount.php?error=Uploaded file is too large", true, 301);
                    exit;
                }
                else
                {
                    $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imageExtensionLower = strtolower($imageExtension);

                    $allowedImageExtensions = array("jpg", "jpeg", "png");

                    if (in_array($imageExtensionLower, $allowedImageExtensions))
                    {
                        $imageFileName = "user-" . $userId;
                        $imageUploadPath = "images/" . $imageFileName;
                        move_uploaded_file($imagePath, $imageUploadPath);
                    }
                    else
                    {
                        header("Location: updateAccount.php?error=Invalid file format", true, 301);
                        exit;
                    }
                }
            }
        }
        else
        {
            $imageUploadPath = "images/defaultUser.png";
        }
        
        if ($password == $currentPassword && $currentPassword == $confirmPassword)
        {
            $sql = "SELECT * FROM usertable WHERE EMAIL = '$currentEmail'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) 
            {
                if ($imageName == '' || $imageName == NULL)
                {
                    $sql = "UPDATE usertable SET
                    FULLNAME = '$fullName',
                    HOMEADDRESS = '$address',
                    CONTACTNUMBER = '$contactNumber',
                    EMAIL = '$email'
                    WHERE EMAIL = '$currentEmail'";

                    $conn->query($sql);
                }
                else
                {
                    $sql = "UPDATE usertable SET
                    FULLNAME = '$fullName',
                    HOMEADDRESS = '$address',
                    CONTACTNUMBER = '$contactNumber',
                    EMAIL = '$email',
                    IMGPATH = '$imageUploadPath'
                    WHERE EMAIL = '$currentEmail'";

                    $conn->query($sql);
                }
                    
                $_SESSION['fullName'] = $fullName;
                $_SESSION['address'] = $address;
                $_SESSION['contactNumber'] = $contactNumber;
                $_SESSION['email'] = $email;
                $_SESSION['imagePath'] =  $imageUploadPath;
            }
            header("Location: updateAccount.php?error=Record Successfully Updated!", true, 301);
            exit;
        }
        else
        {
            header("Location: updateAccount.php?error=Password Incorrect!", true, 301);
            exit;
        }
    }
?>