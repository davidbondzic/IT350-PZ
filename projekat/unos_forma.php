<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Esports</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <h2>Unos tima</h2>

    <form action="unos_tima.php" method="POST">
        <label for="naziv">Naziv tima:</label>
        <input type="text" name="naziv" id="naziv" required><br><br>

        <label for="broj_clanova_tima">Broj clanova tima:</label>
        <input type="number" name="broj_clanova_tima" id="broj_clanova_tima" required><br><br>

        <label for="godina_osnivanja">Godina osnivanja:</label>
        <input type="number" name="godina_osnivanja" id="godina_osnivanja" required><br><br>

        <label for="tag_tima">Tag tima:</label>
        <input type="text" name="tag_tima" id="tag_tima" required><br><br>

        <label for="id_racunara">ID računara:</label>
        <input type="number" name="id_racunara" id="id_racunara" required><br><br>

        <input type="submit" value="Dodaj tim">
    </form>
</body>
</html>
