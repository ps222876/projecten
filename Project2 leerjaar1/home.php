<!DOCTYPE html>
<html lang="nl">

<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="icon" type="image/x-icon" href="afb/favicon.png">
  <script src="script/home.js"></script>
</head>

<body>
  <div class="header">
    <img src="afb/logo.png" alt="1" id="logo">
    <p id="header_txt"> De fluitende fietser</p>
    <input type="text" id="zoekbalk" placeholder="Search...">
    <img src="afb/zoek.png" alt="1" id="zoek">
  </div>
  <div class="nav">
    <a class="active menucolor" href="home.php">Home</a>
    <a href="fiets.php" class="menucolor">Fietsen</a>
    <a href="verhuur.php" class="menucolor">Fietsverhuur</a>
    <a href="contact.php" class="menucolor">Contact</a>
    <a href="over_ons.php" class="menucolor">Over ons</a>
  </div>
  <div class="body_home">
    <div id="welkom">
      <p>
        <?php
        $myfile = fopen("text/welkom.txt", "r") or die("Unable to open file!");
        echo fread($myfile, filesize("text/welkom.txt"));
        fclose($myfile);

        ?>
      </p>

    </div>

    <div id="slider">
      <ul id="slideWrap">
        <li><img src="afb/sfeer1.jpg" alt=""></li>
        <li><img src="afb/sfeer2.jpg" alt=""></li>
        <li><img src="afb/sfeer3.jpg" alt=""></li>
        <li><img src="afb/sfeer4.jpg" alt=""></li>
        <li><img src="afb/sfeer5.jpg" alt=""></li>
      </ul>
      <a id="prev">&#8810;</a>
      <a id="next">&#8811;</a>
    </div>
    <div id="open_dicht1">
      <p>
        <?php
        date_default_timezone_set('Europe/Amsterdam');
        $date = date('w');
        $time = date('H:i');
        $counter = 0;
        
        $handle = fopen("text/openingstijden.txt", "r");
        if ($handle) {
          while (($line = fgets($handle)) !== false) {
            
            echo $line . "<br/>";
            $arr = explode(' ', $line);
            $opentimests = strtotime($arr[1]);
            $sluittimets = strtotime($arr[3]);
            $opentime = date('H:i', $opentimests);
            $sluittime = date('H:i', $sluittimets);
           
            $counter++;
            if ($counter == $date) {
              
              if ($time >= $opentime) {
                  if ($time <= $sluittime) {
                  echo '<div class="open_text">'; 
                  echo '<p class="OpeningTime1">We zijn geopend! ';
                  echo '</p>';
                  echo '</div>';
              
                }
              } else {
                echo '<div class="close_text">';
                echo '<p class="ClosingTime2">We zijn gesloten! ';
                echo '</p>';
                echo '</div>';

              }
            }
          }
        }
      
        
      


        fclose($handle);

        ?>
      <br>



    </div>

  </div>

  <?php
  include "footer.php";
  ?>
</body>

</html>