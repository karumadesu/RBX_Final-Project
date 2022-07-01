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
        <link rel = "stylesheet" href = "homeStyle.css">
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
        <div class = "slideshowContainer">
            <div class = "mySlides fade">
                <img src = "images/img1.jpg" class = "slideshowImage">
            </div>
            <div class = "mySlides fade">
                <img src = "images/img2.jpg" class = "slideshowImage">
            </div>
            <div class = "mySlides fade">
                <img src = "images/img3.jpg" class = "slideshowImage">
            </div>
        </div>
        <p class = "productsTitle">
            product catalog
        </p>
        <div class = "homeProducts">
            <div class = "product" style = "background: url(images/aloe.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Aloe Vera </p>
                </div>
            </div>
            <div class = "product" style = "background: url(images/algerian-ivy.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Algerian Ivy </p>
                </div>
            </div>
            <div class = "product" style = "background: url(images/baby-rubberplant.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Baby Rubberplant </p>
                </div>
            </div>
            <div class = "product" style = "background: url(images/beetle-peperomia.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Beetle Peperomia </p>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <div class = "homeProducts">
            <div class = "product" style = "background: url(images/calathea-medallion.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Calathea Medallion </p>
                </div>
            </div>
            <div class = "product" style = "background: url(images/devils-ivy.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Devil's Ivy </p>
                </div>
            </div>
            <div class = "product" style = "background: url(images/dwarf-umbrella.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Dwarf Umbrella </p>
                </div>
            </div>
            <div class = "product" style = "background: url(images/money-plant.jpg) center">
                <div class = "productOverlay">
                    <p class = "productName"> Money Plant </p>
                </div>
            </div>
        </div>  
        <br><br><br><br><br><br>
        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() 
            {
                var i;
                var slides = document.getElementsByClassName("mySlides");

                for (i = 0; i < slides.length; i++) 
                {
                    slides[i].style.display = "none";
                }
                slideIndex++;

                if (slideIndex > slides.length) 
                {
                    slideIndex = 1
                }

                slides[slideIndex-1].style.display = "block";
                setTimeout(showSlides, 3000);
            }
        </script>
    </body>
</html>