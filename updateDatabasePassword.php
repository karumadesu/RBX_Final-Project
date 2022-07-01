<?php
    session_start();
    require 'createConnection.php';

    if(isset($_POST['save']))
    {
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $userId = $_SESSION['userId'];

        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        
        if ($password == $currentPassword && $newPassword == $confirmPassword)
        {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM usertable WHERE EMAIL = '$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) 
            {
                $sql = "UPDATE usertable SET
                PASS = '$hashedPassword'
                WHERE EMAIL = '$email'";

                $conn->query($sql);
                    
                $_SESSION['password'] = $hashedPassword;
            }
            header("Location: changePassword.php?error=Record Successfully Updated!", true, 301);
            exit;
        }
        else
        {
            header("Location: changePassword.php?error=Incorrect Password / Passwords do not match", true, 301);
            exit;
        }
    }
?>