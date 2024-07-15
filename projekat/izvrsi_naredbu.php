<?php
require_once('konekcija.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Provera da li je izabrana opcija iz dropdown liste
  if (isset($_POST['naredba'])) {
    $naredba = $_POST['naredba'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports_turniri";

        $conn = mysqli_connect($servername, $username, $password, $database);

    // Izvršavanje odabranog upita
    switch ($naredba) {
      case '1':
        // Prikaz timova sa više od 5 igrača, sortirano po godini osnovanja
        $query = "SELECT Naziv, Broj_clanova_tima, Godina_osnivanja
                  FROM tim
                  GROUP BY Broj_clanova_tima
                  HAVING Broj_clanova_tima > 5
                  ORDER BY Godina_osnivanja";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
      case '2':
        // Prikaz igrača gde umesto M ili Z piše pun pol igrača
        $query = "SELECT Ime, Prezime, Godine, 
                  CASE 
                  WHEN Pol = 'M' THEN 'Muški'
                  WHEN Pol = 'Z' THEN 'Ženski'
                  ELSE 'Nepoznato'
                  END AS Pol
                  FROM igrac";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
      case '3':
        // Kreiranje pogleda
        $query = "CREATE VIEW PrikazIgracaITima AS
                  SELECT i.ID_igraca, i.Ime, i.Prezime, i.Pol, i.Godine, i.IGN, t.Naziv AS TimNaziv
                  FROM igrac i
                  LEFT JOIN tim t ON i.ID_tima = t.ID_tima;";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
      case '4':
        // Prikaz igrača starijih od 20 godina, sortiranih po godinama, sa ograničenjem od 5 rezultata
        $query = "SELECT Ime, Prezime, Godine
                  FROM igrac
                  WHERE Godine BETWEEN 20 AND 100
                  ORDER BY Godine DESC
                  LIMIT 5";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
      case '5':
        // Prikaz timova čiji naziv ne sadrži reč "Team"
        $query = "SELECT *
                  FROM tim
                  WHERE Naziv NOT LIKE '%Team%'";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
      case '6':
        // Prikaz igrača koji imaju tim
        $query = "SELECT Ime, Prezime
                  FROM igrac
                  WHERE EXISTS (
                    SELECT 1
                    FROM tim
                    WHERE tim.ID_tima = igrac.ID_tima
                  )";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
        case '7':
        // Prikaz broja igrača po timu i prosečne godine igrača u svakom timu
        $query = "SELECT t.Naziv AS Tim, COUNT(i.ID_igraca) AS BrojIgraca, AVG(i.Godine) AS ProsecanBrojGodina
                  FROM tim t
                  JOIN igrac i ON t.ID_tima = i.ID_tima
                  GROUP BY t.Naziv";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
        case '8':
        // Ažuriranje godina igrača sa ID_igraca = 1 na vrednost 27
        $query = "UPDATE igrac
                  SET Godine = 27
                  WHERE ID_igraca = 1";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
        case '9':
        // Prikaz imena timova osnovanih u određenoj godini
        $query = "SELECT Naziv
                  FROM tim
                  WHERE YEAR(Godina_osnivanja) = 2021";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
        case '10':
        // Prikaz timova sa više od 5 članova koji su osnovani pre određene godine
        $query = "SELECT Naziv
                  FROM tim
                  WHERE Godina_osnivanja < 2010 AND Broj_clanova_tima > 5";
                  echo "<br/><a href='naredba.php'>Nazad</a></center>";
        break;
        default:
        echo "Nepoznat upit.";
        exit;
    }

    // Izvršavanje upita
    $result = mysqli_query($conn, $query);

    // Provera da li je upit uspešno izvršen
    if ($result) {
      // Prikaz rezultata upita
      echo "<table>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) {
          echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Greška prilikom izvršavanja upita: " . mysqli_error($conn);
    }

    // Oslobađanje resursa
    mysqli_free_result($result);
  } else {
    echo "Nije izabran upit.";
  }
}
?>