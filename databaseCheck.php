<?php
    session_start();
    require 'createConnection.php';

    if (isset($_POST['login']))
    {
        $loginEmail = $_POST['loginEmail'];
        $loginPassword = $_POST['loginPassword'];
        $adminEmail = "admin@jangmin.com";

        $sql = "SELECT * FROM usertable WHERE EMAIL = '$loginEmail'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1 && $loginEmail != $adminEmail) 
        {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['PASS'];
            
            if (password_verify($loginPassword, $hashedPassword) == 1 && $row['EMAIL'] == $loginEmail)
            {
                $_SESSION['fullName'] = $row['FULLNAME'];
                $_SESSION['address'] = $row['HOMEADDRESS'];
                $_SESSION['contactNumber'] = $row['CONTACTNUMBER'];
                $_SESSION['email'] = $row['EMAIL'];
                $_SESSION['password'] = $loginPassword;
                $_SESSION['imagePath'] = $row['IMGPATH'];
                $_SESSION['userId'] = $row['ID'];

                $_SESSION['loginEmail'] = $loginEmail;
                $_SESSION['loginPassword'] = $loginPassword;
                $_SESSION['loginRemember'] = $_POST['loginRemember'];


                if (!empty($_POST['loginRemember']))
                {
                    setcookie('loginEmail', $_SESSION['email'], time() + (86400 * 30));
                    setcookie('loginPassword', $_SESSION['password'], time() + (86400 * 30));
                    setcookie('loginRemember', $_POST['loginRemember'], time() + (86400 * 30));
                }
                else
                {
                    setcookie('loginEmail', $_SESSION['email'], time() - 1);
                    setcookie('loginPassword', $_SESSION['password'], time() - 1);
                    setcookie('loginRemember', $_POST['loginRemember'], time() - 1);
                }
                header("Location: login.php?error=Login Successful! Redirecting...", true, 301);
                exit;
            }
            $_SESSION['activeTest'] = 0;
            header("Location: login.php?error=Invalid Login Credentials", true, 301);
            exit;
        }
        else
        {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['PASS'];

            if (password_verify($loginPassword, $hashedPassword) == 1 && $row['EMAIL'] == $adminEmail)
            {
                $_SESSION['email'] = $loginEmail;
                $_SESSION['password'] = $loginPassword;
                $_SESSION['loginRemember'] = $_POST['loginRemember'];
                
                if (!empty($_POST['loginRemember']))
                {
                    setcookie('loginEmail', $_SESSION['email'], time() + (86400 * 30));
                    setcookie('loginPassword', $_SESSION['password'], time() + (86400 * 30));
                    setcookie('loginRemember', $_POST['loginRemember'], time() + (86400 * 30));
                }
                else
                {
                    setcookie('loginEmail', $_SESSION['email'], time() - 1);
                    setcookie('loginPassword', $_SESSION['password'], time() - 1);
                    setcookie('loginRemember', $_POST['loginRemember'], time() - 1);
                }
                header("Location: login.php?error=Admin Login! Redirecting...", true, 301);
                exit;
            }
            $_SESSION['activeTest'] = 0;
            header("Location: login.php?error=Invalid Login Credentials", true, 301);
            exit;
        }
    }
?>