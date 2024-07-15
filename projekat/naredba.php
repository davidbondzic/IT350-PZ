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
<form action="izvrsi_naredbu.php" method="POST">
  <label for="naredba">Izaberite upit:</label>
  <select name="naredba" id="naredba">
    <option value="1">Upit 1</option>
    <option value="2">Upit 2</option>
    <option value="3">Upit 3</option>
    <option value="4">Upit 4</option>
    <option value="5">Upit 5</option>
    <option value="6">Upit 6</option>
    <option value="7">Upit 7</option>
    <option value="8">Upit 8</option>
    <option value="9">Upit 9</option>
    <option value="10">Upit 10</option>
  </select>
  <input type="submit" name="submit" value="Prikaži">
</form>
    <br>
    <p class="center">
      1. Upit u kom morate koristiti GROUP BY, HAVING i ORDER BY.<br>
      2. Upit u kom morate koristiti CASE.<br>
      3. Upit u kom ćete kreirati pogled (VIEW) i koristiti LEFT ili RIGHT JOIN.<br>
      4. Upit u kom morate koristiti BETWEEN, ORDER BY i LIMIT.<br>
      5. Upit u kom morate koristiti WHERE i (NOT) LIKE i WILDCARDS.<br>
      6. Upit u kom morate koristiti (NOT) EXISTS.<br>
      7. Upit u kom morate koristiti minimum DVE AGREGATNE funkcije I GROUP BY.<br>
      8. UPDATE upit.<br>
      9. Upit u kom morate koristiti JEDNU od sledećih funkcija: DAY, DAYNAME, MONTH, MONTHNAME, YEAR.<br>
      10. Upit u kom morate koristiti AND ili OR.<br></p>
</body>
</html>
