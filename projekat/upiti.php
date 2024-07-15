<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<br>
<form action="izvrsi_upit.php" method="POST">
  <label for="upit">Izaberite upit:</label>
  <select name="upit" id="upit">
    <option value="1">Upit 1</option>
    <option value="2">Upit 2</option>
    <option value="3">Upit 3</option>
    <option value="4">Upit 4</option>
    <option value="5">Upit 5</option>
    <option value="6">Upit 6</option>
  </select>
  <input type="submit" name="submit" value="Prikaži">
</form>
    <br>
    <p class="center">
      1. Prikazati tagove svih timova koji imaju igrače koji u svom IGN-u imaju broj jedan i koji su
      osnovani nakon 2019. godine.<br>
      2. Prikazati sve timove koji učestvuju na turniru koji se održava u Kini. Sorrtirati timove po broju
      igrača.<br>
      3. Prikazati sve nagrade koje je osvojio svaki tim na poslednjem održanom turniru.<br>
      4. Prikazati broj voditelja za svaki turnir koji se izvodi u Areni 1, ukoliko je broj voditelja veći od 1.<br>
      5. Prikazati sponzor koji finansira maksimalni broj nagrada, ukoliko ima više takvih timova prikazati
      ih sve.<br>
      6. Prikazati tim koji ima računar sa najvećom količinom rama i procesorom koji čiji je proizvožđač
      Intel (sadrži i u nazivu).<br></p>
</body>
</html>
