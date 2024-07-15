<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Brisanje tima</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <br>
    <h2>Forma za brisanje tima</h2><br>
    
    <form method="POST" action="brisanje_tima.php">
        <label for="tim">Izaberite tim za brisanje:</label>
        <select name="tim" id="tim">
            <option value="1">iNation</option>
            <option value="2">Natus Vincere</option>
            <option value="3">Team Vitality</option>
            <option value="4">Fnatic</option>
            <option value="5">G2</option>
            <option value="6">Zero Tenacity</option>
            <option value="7">Ninjas In Pyjamas</option>
            <option value="9">Cloud 9</option>
        </select>
        <input type="submit" value="Izbrisi">
    </form>
    <br>
</body>
</html>

<?php
// Konekcija sa bazom podataka
$conn = mysqli_connect("localhost", "root", "", "esports_turniri");

// Provera konekcije
if (!$conn) {
    die("Neuspela konekcija sa bazom podataka: " . mysqli_connect_error());
}

// Provera da li je forma poslata
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Provera da li je odabran tim za brisanje
    if (isset($_POST["tim"])) {
        $tim = $_POST["tim"];

        // SQL upit za brisanje tima iz tabele
        $sql = "DELETE FROM timovi WHERE naziv = '$tim'";

        // Izvršavanje upita
        if (mysqli_query($conn, $sql)) {
            echo "Tim uspešno obrisan.";
        } else {
            echo "Greška prilikom brisanja tima: " . mysqli_error($conn);
        }
    } else {
        echo "Molimo vas da izaberete tim za brisanje.";
    }
}

// Zatvaranje konekcije
mysqli_close($conn);
?>






