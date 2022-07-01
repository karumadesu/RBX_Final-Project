<?php
    session_start();
    require 'createConnection.php';

    if (!isset($_COOKIE['loginRemember']))
    {
        setcookie('loginEmail', $_SESSION['loginEmail'], time() - 1);
        setcookie('loginPassword', $_SESSION['loginPassword'], time() - 1);
        setcookie('loginRemember', $_POST['loginRemember'], time() - 1);

        session_unset();
        session_destroy();
    }
    $sql = "DROP TABLE carttable";
    $conn->query($sql);
    $_SESSION['activeTest'] = 0;
    header("Location: login.php", true, 301);
?>