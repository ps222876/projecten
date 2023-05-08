<!DOCTYPE html>
<html lang="nl">

<head>
  <title>Contact</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="icon" type="image/x-icon" href="afb/favicon.png">
  <script src="script/contact.js"></script>
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
    <a href="contact.php" class="active menucolor">Contact</a>
    <a href="over_ons.php" class="menucolor">Over ons</a>
  </div>

  <div id="grid_contact">

    <div id="form">
      <form action="/action_page.php">
        <input type="text" id="voornaam" placeholder="Voornaam" /><br><br>
        <input type="text" id="achternaam" placeholder="Achternaam" /><br><br>
        <input type="text" id="mail" placeholder="E-mail" />
      </form>
    </div>


    <div id="gegevens">
      <p>Rauwe Putten 30<br>
        5674 SL Nuenen<br>
        Tel: 067762993888<br>
        E-mail: info@defluitendefietser.nl
      </p>
    </div>

    <div id="maps">
      <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.12322967997!2d5.593374315538906!3d51.474252320947656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf2415daeb5e76b17!2zNTHCsDI4JzI3LjMiTiA1wrAzNSc0NC4wIkU!5e0!3m2!1sen!2snl!4v1649662480097!5m2!1sen!2snl"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div id="openingstijden">
      <p>
        <?php
        $handle = fopen("text/openingstijden.txt", "r");
        if ($handle) {
          while (($line = fgets($handle)) !== false) {
            // process the line read.
            echo $line . "<br/>";
          }
          fclose($handle);
        } else {
          // error opening the file.
        }
        ?>
      </p>
    </div>

    <div id="btn">
      <button id="button" onclick="myFunction()">Gegevens versturen</button>
    </div>



  </div>
  <?php
  include "footer.php";
  ?>
</body>

</html>