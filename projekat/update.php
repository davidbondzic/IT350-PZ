<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ažuriranje tima</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body><br>
    <h2>Forma za ažuriranje tima</h2><br>
    
    <form method="POST" action="update_tima.php">
        <label for="id_tima">ID tima:</label>
        <input type="text" name="id_tima" id="id_tima"><br>
        <br>
        <label for="naziv">Novi naziv:</label>
        <input type="text" name="naziv" id="naziv"><br>
        <br>
        <label for="broj_clanova_tima">Novi broj clanova tima:</label>
        <input type="text" name="broj_clanova_tima" id="broj_clanova_tima"><br>
        <br>
        <label for="godina_osnivanja">Nova godina osnivanja:</label>
        <input type="text" name="godina_osnivanja" id="godina_osnivanja"><br>
        <br>
        <label for="tag_tima">Novi tag tima:</label>
        <input type="text" name="tag_tima" id="tag_tima"><br>
        <br>
        <label for="id_racunara">Novi id racunara:</label>
        <input type="text" name="id_racunara" id="id_racunara"><br>
        <br>
        <input type="submit" value="Azuriraj">
    </form>
</body>
</html>
