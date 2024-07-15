<?php
// Konekcija sa bazom podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esports_turniri";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Neuspela konekcija sa bazom podataka: " . $conn->connect_error);
}

// Provera da li su podaci poslati iz forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prihvatanje unetih podataka
    $naziv = $_POST["naziv"];
    $broj_clanova_tima = $_POST["broj_clanova_tima"];
    $godina_osnivanja = $_POST["godina_osnivanja"];
    $tag_tima = $_POST["tag_tima"];
    $id_racunara = $_POST["id_racunara"];

    // SQL upit za unos podataka u tabelu "tim"
    $sql = "INSERT INTO tim (naziv, broj_clanova_tima, godina_osnivanja, tag_tima, id_racunara) VALUES ('$naziv', $broj_clanova_tima, $godina_osnivanja, '$tag_tima', $id_racunara)";

    if ($conn->query($sql) === TRUE) {
        echo "Tim je uspešno dodat.";
    } else {
        echo "Greška prilikom dodavanja tima: " . $conn->error;
    }
    echo "<br/><a href='index.php'>Početna</a></center>";
}

// Zatvaranje konekcije sa bazom podataka
$conn->close();
?>
