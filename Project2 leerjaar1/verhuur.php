<!DOCTYPE html>
<html lang="nl">

<head>
  <title>Fietsverhuur</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/verhuur.css">
  <link rel="stylesheet" href="css/verhuur2.css">
  <link rel="stylesheet" href="css/fiets2.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="script/verhuur.js"></script>
</head>

<body>
  <div class="header">
    <img alt="1" src="afb/logo.png" id="logo">
    <p id="header_txt"> De fluitende fietser</p>
    <input type="text" id="zoekbalk" placeholder="Search...">
    <img alt="1" src="afb/zoek.png" id="zoek">
  </div>
  <div class="nav">
    <a class="menucolor" href="home.php">Home</a>
    <a href="fiets.php" class="menucolor">Fietsen</a>
    <a href="verhuur.php" class="active menucolor">Fietsverhuur</a>
    <a href="contact.php" class="menucolor">Contact</a>
    <a href="over_ons.php" class="menucolor">Over ons</a>
  </div>

  <div id="body_verhuur">
    <img id="afb1" alt="1" src="afb/verhuur1.jpg">
    <img id="afb2" alt="1" src="afb/verhuur2.jpg">

    <div id="tabel">
      <table>
        <?php
        $counter = 0;
        $handle = fopen("text/fietsverhuur.txt", "r");
        if ($handle) {
          while (($line = fgets($handle)) !== false) {
            // process the line read.
            $arr = explode(':€ ', $line);
            $arr1 = explode('/', $arr[1]);
            $arr2 = explode(':', $arr1[1]);
            $dag = $arr2[1];
            $prijs = $arr1[0];

            $string = $arr2[1];
            $int_value = intval($string);

            $floatValue = floatval($arr1[0]);
            (number_format($floatValue / $int_value, 2));
            // var_dump(round($prijs, 2, PHP_ROUND_HALF_UP));
            // var_dump(round(str_replace(',', '.', $prijs), 2));
            // ound(int|float $prijs, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float
            // $floatValue / $string;

            echo '<tr>';
            echo '<td>';
            echo '<input class="checkbox" data-naamfiets="' . $arr[0] . ' " data-prijs="' . $floatValue / $int_value . '" data-dag="per dag" type="checkbox" id="tcb' . $counter . '" onclick="checkbox(' . $counter . ')"><br>';
            echo '</td>';
            echo '<td>';
            echo $arr[0] . " €" . (number_format($floatValue / $int_value, 2)) . " per dag";
            echo ' </td>';
            echo '</tr>';
            $counter++;
          }
          fclose($handle);
        }
        ?>
      </table>

      <div class="body_fietsen">
        <div id="form1">
          <button class="btn_style" disabled id="btn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Huur de fietsen</button>
        </div>
        <div id="id01" class="modal">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            <div class="container">
              <div class="row">
                <div class="col-75">
                  <div class="container">

                      <div class="row">
                        <div class="col-50">
                          <h3>Betaal gegevens</h3>
                          <label for="fname"><i class="fa fa-user"></i> Volledige naam</label>
                          <input type="text" id="fname" name="firstname" placeholder="Peter Askey">
                          <label for="email"><i class="fa fa-envelope"></i> E-mail</label>
                          <input type="text" id="email" name="email" placeholder="1234@gmail.com">
                          <label for="adr"><i class="fa fa-address-card-o"></i> Straarnaam</label>
                          <input type="text" id="adr" name="address" placeholder="Sterrenlaan 10">
                          <label for="city"><i class="fa fa-institution"></i> Stad</label>
                          <input type="text" id="city" name="city" placeholder="Eindhoven">

                          <div class="row">
                            <div class="col-50">
                              <label for="state">Postcode</label>
                              <input type="text" id="state" name="state" placeholder="1234AB">
                            </div>
                            <div class="col-50">
                              <label for="zip">Huisnummer</label>
                              <input type="text" id="zip" name="zip" placeholder="1">
                            </div>
                          </div>
                        </div>

                        <div class="col-50">

                          <label for="cname">Naam op kaart</label>
                          <input type="text" id="cname" name="cardname" placeholder="Peter Askey">
                          <label for="ccnum">Creditcard nummer</label>
                          <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                          <label for="expmonth">Exp Maand</label>
                          <input type="text" id="expmonth" name="expmonth" placeholder="September">
                          <div class="row">
                            <div class="col-50">
                              <label for="expyear">Exp jaar</label>
                              <input type="text" id="expyear" name="expyear" placeholder="2025">
                            </div>
                            <div class="col-50">
                              <label for="cvv">CVV</label>
                              <input type="text" id="cvv" name="cvv" placeholder="123">
                            </div>
                          </div>
                        </div>

                      </div>
                      <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Verzendadres hetzelfde als facrurering
                      </label>
                      <button class="btn" onclick="bestellen()">Verder gaan met bestellen</button>
                  </div>
                </div>
                <div class="col-25">
                  <h4>Winkelwagen <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
                  <div class="mijn-winkelwagen">
                    <br>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
        <?php
        include "footer.php";
        ?>
</body>


</html>