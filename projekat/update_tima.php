<?php
// Konekcija sa bazom podataka
$conn = mysqli_connect("localhost", "root", "", "esports_turniri");

// Provera konekcije
if (!$conn) {
    die("Neuspela konekcija sa bazom podataka: " . mysqli_connect_error());
}

// Provera da li je forma poslata
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Provera da li su uneti svi potrebni podaci
    if (isset($_POST["id_tima"]) && isset($_POST["naziv"]) && isset($_POST["broj_clanova_tima"]) && isset($_POST["godina_osnivanja"]) && isset($_POST["tag_tima"]) && isset($_POST["id_racunara"])) {
        $id_tima = $_POST["id_tima"];
        $naziv = $_POST["naziv"];
        $broj_clanova_tima = $_POST["broj_clanova_tima"];
        $godina_osnivanja = $_POST["godina_osnivanja"];
        $tag_tima = $_POST["tag_tima"];
        $id_racunara = $_POST["id_racunara"];


        // SQL upit za ažuriranje tima u tabeli
        $sql = "UPDATE tim SET naziv = '$naziv', broj_clanova_tima = '$broj_clanova_tima', godina_osnivanja = '$godina_osnivanja', tag_tima = '$tag_tima', id_racunara = '$id_racunara' WHERE id_tima = '$id_tima'";

        // Izvršavanje upita
        if (mysqli_query($conn, $sql)) {
            echo "Tim uspešno ažuriran.";
        } else {
            echo "Greška prilikom ažuriranja tima: " . mysqli_error($conn);
        }
    } else {
        echo "Molimo vas da unesete sve potrebne podatke.";
    }
    echo "<br/><a href='index.php'>Početna</a></center>";
}

// Zatvaranje konekcije
mysqli_close($conn);
?>
