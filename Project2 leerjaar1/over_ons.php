<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Over ons</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/over_ons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="afb/favicon.png">
</head>

<body id="body_index">
    <div class="header">
        <img src="afb/logo.png" alt="1" id="logo">
        <p id="header_txt"> De fluitende fietser</p>
        <input type="text" id="zoekbalk" placeholder="Search...">
        <img src="afb/zoek.png" alt="1" id="zoek">
    </div>
    <div class="nav">
        <a class="menucolor" href="home.php">Home</a>
        <a href="fiets.php" class="menucolor">Fietsen</a>
        <a href="verhuur.php" class="menucolor">Fietsverhuur</a>
        <a href="contact.php" class="menucolor">Contact</a>
        <a href="over_ons.php" class="active menucolor">Over ons</a>
    </div>

    <div id="text_overons">
        <?php
        $handle = fopen("text/overons.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                // process the line read.
                echo $line . "<br/>";
            }
            fclose($handle);
        } else {
            // error opening the file.
        }
        echo '<img id="foto" src="afb/historie1.jpg" alt="historie" />';
        // include "footer.php"
        ?>

    </div>


    <?php
    include "footer.php";
    ?>
</body>

</html>