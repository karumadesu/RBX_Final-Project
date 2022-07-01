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
        <link rel = "stylesheet" href = "viewUsersStyle.css">
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
            View Users
        </div>
        <br>
        <?php
            if(isset($_GET['removed']))
            {
                echo "<div class = \"errorContainer\">";
                echo "<p class = \"error\">";
                echo $_GET['removed'] . "'s records has been deleted!";
                echo "</p>";
                echo "</div>";
                echo "<br><br>";
            }
        ?>
        <?php
            require 'createConnection.php';
        
            $sql = "SELECT * FROM usertable";
            $result = $conn->query($sql);

            if ($result->num_rows > 1) 
            {
                echo "<table>";
                echo "<tr>";
                echo "<th> Image </th>";
                echo "<th> ID </th>";
                echo "<th> Full Name </th>";
                echo "<th> Address </th>";
                echo "<th> Contact Number </th>";
                echo "<th> Email </th>";
                echo "<th> Action </th>";
                echo "</tr>";

                while($row = $result->fetch_assoc()) 
                {     
                    if ($row['ID'] != 1)
                    {
                        echo "<tr>";	
                        echo "<td><img src=\"" . $row['IMGPATH'] . "\" width = \"150px\" style = \"vertical-align: bottom;\"></td>";
                        echo "<td width = \"100px\">" . $row['ID']."</td> ";
                        echo "<td width = \"300px\">" . $row['FULLNAME']."</td> ";
                        echo "<td width = \"300px\">" . $row['HOMEADDRESS']."</td> ";
                        echo "<td width = \"150px\">" . $row['CONTACTNUMBER']."</td>";
                        echo "<td width = \"250px\">" . $row['EMAIL']."</td>";  
                        echo "<td width = \"150px\"> <a href = \"deleteUser.php?id=" . $row['ID'] . "\" class = \"delete\"> Delete </a></td>";  
                        echo "</tr>";
                    }
                }
                echo "</table>";
            } 
            else 
            {
                echo "<div class = \"errorContainer\">";
                echo "<p class = \"error\">";
                echo "No users found!";
                echo "</p>";
                echo "</div>";
                echo "<br><br>";
            }
        ?>
    </body>
</html>
