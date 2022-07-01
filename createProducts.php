<?php
    require 'createConnection.php';

    $plantName1 = "Aloe Vera";
    $plantSciName1 = "Aloe vera";
    $plantDesc1 = "I am widely known as a bit of a healer to soothe burns on the skin, such as a sunburn. I am also able to speed wound healing by improving blood circulation through the area. Ya, I know, pretty impressive.";
    $plantImg1 = "images/aloe.jpg";
    $price1 = "200";

    $plantName2 = "Algerian Ivy";
    $plantSciName2 = "Hedera canariensis";
    $plantDesc2 = "I am a beautiful evergreen vine with lush foliage. Some may say I come on a little too strong because I am a fast grower who can take over an area pretty quickly, but that is just my way of showing you that you are taking great care of me and that I am happy in my new home.";
    $plantImg2 = "images/algerian-ivy.jpg";
    $price2 = "650";

    $plantName3 = "Baby Rubberplant";
    $plantSciName3 = "Peperomia obtusifolia";
    $plantDesc3 = "If you were looking for an easy-care, attractive and fast-growing houseplant, then here I am. Despite my similar name, I am not related to the larger rubber plant, and do not produce latex, only smiles.";
    $plantImg3 = "images/baby-rubberplant.jpg";
    $price3 = "400";

    $plantName4 = "Beetle Peperomia";
    $plantSciName4 ="Peperomia angulata";
    $plantDesc4= "I am an adorable little houseplant with creeping stems, making me a perfect plant for shelves, ledges or in a hanging pot. My leaves are dark green and have light green stripes running through them. I am pretty easy to care for, just give me lots of indirect light and do not overwater me and we will get along just fine.";
    $plantImg4 = "images/beetle-peperomia.jpg";
    $price4 = "350";

    $plantName5 = "Calathea Medallion";
    $plantSciName5 = "Calathea veitchiana";
    $plantDesc5 = "I am part of the Prayer Plant family, so my leaves will close at night, like praying hands, and open again in the morning when the sun rises. I love lots of indirect light and thrive in humid areas.";
    $plantImg5 = "images/calathea-medallion.jpg";
    $price5 = "400";

    $plantName6 = "Devils Plant";
    $plantSciName6 = "Epipremnum aureum";
    $plantDesc6 = "I am arguably the easiest of all houseplants to grow. Lucky you! I enjoy bright light but can do surprisingly well in low light conditions.";
    $plantImg6 = "images/dwarf-umbrella.jpg";
    $price6 = "650";

    $plantName7 = "Dwarf Umbrella";
    $plantSciName7 = "Schefflera arboricola";
    $plantDesc7 = "I am fairly adaptable plant if you keep me well watered, provide me with lots of bright light and give me an occasional shower to clean my leaves.  Speaking of leaves, mine are beautifully splashed with a soft cream variegation. Lots of bright light will help me maintain my colour.  I am a true dwarf grower so won’t ever outgrow my space. ";
    $plantImg7 = "images/dwarf-umbrella.jpg";
    $price7 = "650";


    $plantName8 = "Money Plant";
    $plantSciName8 = "Pilea peperomiodes";
    $plantDesc8 = "My leaves layer on top of each other, giving me the appearance of large green coins—hence my nickname the money plant. I am thought to bring good fortune, money, and abundance to my owner. I produce lots of babies that may be given away so am also sometimes referred to as the ‘friendship plant’.";
    $plantImg8 = "images/money-plant.jpg";
    $price8 = "650";

    $sql = "SELECT * FROM producttable";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) 
    {
        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE, PLANTIMG)
        VALUES
        (
            '$plantName1',
            '$plantSciName1',
            '$plantDesc1',
            '$price1',
            '$plantImg1'
        )";

        $conn->query($sql);

        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE, PLANTIMG)
        VALUES
        (
            '$plantName2',
            '$plantSciName2',
            '$plantDesc2',
            '$price2',
            '$plantImg2'
        )";

 ;

        $conn->query($sql);

        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE,PLANTIMG)
        VALUES
        (
            '$plantName3',
            '$plantSciName3',
            '$plantDesc3',
            '$price3',
            '$plantImg3'
        )";

        $conn->query($sql);

        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE,PLANTIMG)
        VALUES
        (
            '$plantName4',
            '$plantSciName4',
            '$plantDesc4',
            '$price4',
            '$plantImg4'
        )";

        $conn->query($sql);

        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE,PLANTIMG)
        VALUES
        (
            '$plantName5',
            '$plantSciName5',
            '$plantDesc5',
            '$price5',
            '$plantImg5'
        )";

        $conn->query($sql);

         $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE, PLANTIMG)
        VALUES
        (
            '$plantName6',
            '$plantSciName6',
            '$plantDesc6',
            '$price6',
            '$plantImg6'
        )";

        $conn->query($sql);

        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE, PLANTIMG)
        VALUES
        (
            '$plantName7',
            '$plantSciName7',
            '$plantDesc7',
            '$price7',
            '$plantImg7'
        )";

        $conn->query($sql);

        $sql = "INSERT INTO producttable (PLANTNAME, SCIENTIFICNAME, PLANTDESC, PRICE,PLANTIMG)
        VALUES
        (
            '$plantName8',
            '$plantSciName8',
            '$plantDesc8',
            '$price8',
            '$plantImg8'
        )";

        $conn->query($sql);
    }
?>