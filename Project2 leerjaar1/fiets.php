<!DOCTYPE html>
<html lang="nl">

<head>
  <title>Fietsen</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/fiets.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fiets2.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="icon" type="image/x-icon" href="afb/favicon.png">

</head>

<body>
  <div class="header">
    <img src="afb/logo.png" alt="1" id="logo">
    <p id="header_txt"> De fluitende fietser</p>
    <input type="text" id="zoekbalk" placeholder="Search...">
    <img src="afb/zoek.png" alt="1" id="zoek">
  </div>
  <div class="nav">
    <a class="menucolor" href="home.php">Home</a>
    <a href="fiets.php" class="active menucolor">Fietsen</a>
    <a href="verhuur.php" class="menucolor">Fietsverhuur</a>
    <a href="contact.php" class="menucolor">Contact</a>
    <a href="over_ons.php" class="menucolor">Over ons</a>
  </div>

  <div class="body_fietsen">
    <div id="form1">
      <button class="btn_style" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
        <img id="fiets1" alt="1" src="fietsen/1.jpg">
      </button>
      <p id="tekst1">Pelikaan Carry On Lady</p>
    </div>

    <div id="form2">
      <button class="btn_style" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">
        <img id="fiets2" alt="1" src="fietsen/2.jpg">
      </button>
      <p id="tekst2">Gazelle Orange</p>
    </div>

    <div id="form3">
      <button class="btn_style" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">
        <img id="fiets3" alt="1" src="fietsen/3.jpg">
      </button>
      <p id="tekst3">Allegra voorwielmotor</p>
    </div>

    <div id="form4">
      <button class="btn_style" onclick="document.getElementById('id04').style.display='block'" style="width:auto;">
        <img id="fiets4" alt="1" src="fietsen/4.jpg">
      </button>
      <p id="tekst4">Gazelle CityGo</p>
    </div>


  </div>


  <div id="id01" class="modal">

    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="fietsen/1.jpg" alt="1" class="avatar">
      <div class="container">
        <p>Aandrijving Elektrisch <br>
          geschikt voor zakelijk en prive <br>
          Type Dames <br>
          Transport<br>
          Pelikaan<br>
          Nieuw<br>
          Kleur Zwart <br>
          €769,00 <br>
          28 Inch 53 cm <br>
          3V V-Brakes</p>
      </div>
      <a href="winkelwagen.php?fiets=1&prijs=796,00&naam=Pelikaan">
        <img class="btnwinkelwagen" alt="1" src="afb/winkelwagen.png" />
      </a>

    </div>



  </div>

  <div id="id02" class="modal">

    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="fietsen/2.jpg" alt="Avatar" class="avatar">
      <div class="container">
        <p> voorwielmotor Aandrijving Elektrisch <br>
          geschikt voor zakelijk en prive <br>
          Type Dames <br>
          stad<br>
          Stella<br>
          Nieuw<br>
          Kleur Zwart <br>
          €999,00 <br>
          frameraat S <br>
          Lichaamslengte 1,62m - 1,73m</p>
      </div>
      <a href="winkelwagen.php?fiets=2&prijs=999,00&naam=Gazelle-Orange">
        <img class="btnwinkelwagen" alt="1" src="afb/winkelwagen.png" />
      </a>
    </div>




  </div>

  <div id="id03" class="modal">

    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="fietsen/3.jpg" alt="Avatar" class="avatar">
      <div class="container">
        <p>Aandrijving Elektrisch <br>
          geschikt voor zakelijk en prive <br>
          Type heren <br>
          stad<br>
          Gazelle<br>
          Nieuw<br>
          Kleur Blauw <br>
          €2199,00 <br>
          frameraat 53cm 1.66cm-1.77cm <br>

      </div>
      <a href="winkelwagen.php?fiets=3&prijs=2199,00&naam=Allegra">
        <img class="btnwinkelwagen" alt="1" src="afb/winkelwagen.png" />
      </a>
    </div>



  </div>

  <div id="id04" class="modal">

    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="fietsen/4.jpg" alt="Avatar" class="avatar">
      <div class="container">
        <p>niet elektrisch <br>
          geschikt voor zakelijk en prive <br>
          Type Heren <br>
          stad<br>
          Gazelle<br>
          Nieuw<br>
          Kleur Zwart <br>
          €679,00<br>
          wielmaat 28 inches<br>

      </div>
      <a href="winkelwagen.php?fiets=4&prijs=679,00&naam=Gazelle-CityGo">
        <img class="btnwinkelwagen" alt="1" src="afb/winkelwagen.png" />
      </a>
    </div>
  </div>
  <?php
  include "footer.php";
  ?>
</body>

</html>