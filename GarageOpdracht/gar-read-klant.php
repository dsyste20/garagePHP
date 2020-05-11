<?php
include ('gar-functions.php');

if (!isLoggedIn()){
    $_SESSION['msg'] = "je moet ingelogd zijn";
    header('location: gar-login.php');

}
?>
<!Doctype html>
<html lang="nl">
<head>
    <meta name="author" content="AKEisden">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gar-read.css">
    <title>GARAGE|KLANTEN</title>
</head>
<body>
<header>
    <h1>Alle Klanten</h1>
</header>
<box>
    <?php
      require_once "gar-connect.php";

      $klanten = $conn->prepare("SELECT * FROM klant");
      $klanten->execute();
      echo "<table>";
         echo "<tr>";
         echo "<td>ID</td>";
         echo "<td>Naam</td>";
         echo "<td>Adres</td>";
         echo "<td>Postcode</td>";
         echo "<td>Woonplaats</td>";
         echo "</tr>";
        foreach($klanten as $klant) {
          echo "<tr>";
          echo "<td>".$klant['klantid']."</td>";
          echo "<td>".$klant['klantnaam']."</td>";
          echo "<td>".$klant['klantadres']."</td>";
          echo "<td>".$klant['klantpostcode']."</td>";
          echo "<td>".$klant['klantwoonplaats']."</td>";
          echo "</tr>";
        }
      echo "</table>";
    if (isAdmin()) {
        echo "<br><a href='gar-admin.php' class='button'>Menu</a>";
    } else {
        echo "<br><a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</box>
</body>
</html>
