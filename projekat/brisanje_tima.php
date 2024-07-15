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
        $sql = "DELETE FROM tim WHERE id_tima = '$tim'";

        // Izvršavanje upita
        if (mysqli_query($conn, $sql)) {
            echo "Tim uspešno obrisan.";
        } else {
            echo "Greška prilikom brisanja tima: " . mysqli_error($conn);
        }
    } else {
        echo "Molimo vas da izaberete tim za brisanje.";
    }
    echo "<br/><a href='index.php'>Početna</a></center>";
}

// Zatvaranje konekcije
mysqli_close($conn);
?>
