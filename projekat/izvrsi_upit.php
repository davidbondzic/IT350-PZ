<?php
require_once('konekcija.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Provera da li je izabrana opcija iz dropdown liste
  if (isset($_POST['upit'])) {
    $upit = $_POST['upit'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports_turniri";

        $conn = mysqli_connect($servername, $username, $password, $database);

    // Izvršavanje odabranog upita
    switch ($upit) {
      case '1':
        // Prikaz tagova timova sa IGN brojem 1 i osnovanih nakon 2019. godine
        $query = "SELECT DISTINCT t.tag_tima FROM tim AS t
                  INNER JOIN igrac AS i ON t.id_tima = i.id_tima
                  WHERE i.ign LIKE '%1%' AND t.godina_osnivanja > 2019";
                  echo "<br/><a href='upiti.php'>Nazad</a></center>";
        break;
      case '2':
        // Prikaz timova koji učestvuju na turniru u Kini, sortirane po broju igrača
        $query = "SELECT t.naziv, t.broj_clanova_tima
                  FROM tim AS t
                  INNER JOIN ucestvovanje AS tt ON t.id_tima = tt.id_tima
                  INNER JOIN turnir AS tu ON tt.id_turnira = tu.id_turnira
                  INNER JOIN arena AS a ON tu.id_arene = a.id_arene
                  WHERE a.drzava = 'Kina'
                  ORDER BY t.broj_clanova_tima ASC";
                  echo "<br/><a href='upiti.php'>Nazad</a></center>";
        break;
      case '3':
        // Prikaz osvojenih nagrada za svaki tim na poslednjem turniru
        $query = "SELECT n.naziv AS naziv_nagrade, t.naziv AS naziv_tima
                  FROM nagrada AS n
                  INNER JOIN osvajanje AS tn ON n.id_nagrade = tn.id_nagrade
                  INNER JOIN tim AS t ON tn.id_tima = t.id_tima";
                  echo "<br/><a href='upiti.php'>Nazad</a></center>";
        break;
      case '4':
        // Prikaz broja voditelja za turnire u Areni 1 sa više od 1 voditelja
        $query = "SELECT t.naziv AS naziv_turnira, COUNT(vodjenje.id_voditelja) AS broj_voditelja
                  FROM turnir AS t
                  INNER JOIN vodjenje ON t.id_turnira = vodjenje.id_turnira
                  INNER JOIN arena AS a ON t.id_arene = a.id_arene
                  WHERE a.id_arene = 1
                  GROUP BY t.id_turnira
                  HAVING COUNT(vodjenje.id_voditelja) > 1";
                  echo "<br/><a href='upiti.php'>Nazad</a></center>";
        break;
      case '5':
        // Prikaz sponzora koji finansira maksimalan broj nagrada
        $query = "SELECT s.naziv AS naziv_sponzora, COUNT(n.id_nagrade) AS broj_nagrada
                  FROM sponzor AS s
                  INNER JOIN nagrada AS n ON s.id_sponzora = n.id_sponzora
                  GROUP BY s.id_sponzora
                  HAVING COUNT(n.id_nagrade) = (
                    SELECT MAX(broj_nagrada)
                    FROM (
                      SELECT COUNT(n.id_nagrade) AS broj_nagrada
                      FROM sponzor AS s
                      INNER JOIN nagrada AS n ON s.id_sponzora = n.id_sponzora
                      GROUP BY s.id_sponzora
                    ) AS temp
                  )";
                  echo "<br/><a href='upiti.php'>Nazad</a></center>";
        break;
      case '6':
        // Prikaz tima sa računarom sa najvećom količinom rama i Intel procesorom
        $query = "SELECT t.naziv AS naziv_tima
                  FROM tim AS t
                  INNER JOIN racunar AS r ON t.id_racunara = r.id_racunara
                  WHERE r.procesor LIKE '%intel%'
                  ORDER BY r.ram DESC
                  LIMIT 1";
                  echo "<br/><a href='upiti.php'>Nazad</a></center>";
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