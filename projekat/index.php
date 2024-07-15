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
    <form method="post" action="">
        <label for="tabela">Izaberite tabelu:</label>
        <select name="tabela" id="tabela">
            <option value="Arena">Arena</option>
            <option value="Igrac">Igrac</option>
            <option value="Igrica">Igrica</option>
            <option value="Nagrada">Nagrada</option>
            <option value="Osvajanje">Osvajanje</option>
            <option value="Racunar">Racunar</option>
            <option value="Sponzor">Sponzor</option>
            <option value="Tim">Tim</option>
            <option value="Turnir">Turnir</option>
            <option value="Ucestvovanje">Ucestvovanje</option>
            <option value="Voditelj">Voditelj</option>
            <option value="Vodjenje">Vodjenje</option>
            <option value="Zanrovi">Zanrovi</option>
        </select>
        <input type="submit" name="submit" value="Prikaži">
    </form>
    <br>

    <?php
    // Provera da li je korisnik izabrao tabelu i pritisnuo dugme
    if (isset($_POST['submit']) && isset($_POST['tabela'])) {
        $tabela = $_POST['tabela'];

        // Povezivanje na MySQL bazu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports_turniri";

        $conn = mysqli_connect($servername, $username, $password, $database);

        // Provera da li je uspostavljena veza sa bazom
        if (!$conn) {
            die("Greška pri povezivanju na MySQL: " . mysqli_connect_error());
        }

        // Izvršavanje upita za prikazivanje podataka iz odabrane tabele
        $query = "SELECT * FROM " . $tabela;
        $result = mysqli_query($conn, $query);

        // Prikazivanje rezultata u tabeli
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Prikaz tabele: " . $tabela . "</h2> <br>";
            echo "<table>";
            echo "<tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                // Prikazivanje naziva kolona
                if (!isset($headers)) {
                    $headers = array_keys($row);
                    foreach ($headers as $header) {
                        echo "<th>" . $header . "</th>";
                    }
                    echo "</tr>";
                }
                
                // Prikazivanje vrednosti redova
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nema podataka za prikaz iz tabele " . $tabela;
        }

        // Zatvaranje veze sa bazom
        mysqli_close($conn);
    }
    ?>
</body>
</html>
