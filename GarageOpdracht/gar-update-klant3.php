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
    <link rel="stylesheet" type="text/css" href="css/gar-create-text.css">
    <title>GARAGE|UPDATE KLANT</title>
</head>
<body>
<header>
    <h1>Update Klant</h1>
</header>
<box>
    <?php
      $klantid = $_POST['klantidvak'];
      $klantnaam = $_POST['klantnaamvak'];
      $klantadres = $_POST['klantadresvak'];
      $klantpostcode = $_POST['klantpostcodevak'];
      $klantwoonplaats = $_POST['klantwoonplaatsvak'];

      require_once "gar-connect.php";

      $sql = $conn->prepare("UPDATE klant SET klantnaam = :klantnaam, klantadres = :klantadres, klantpostcode = :klantpostcode, klantwoonplaats = :klantwoonplaats WHERE klantnaam = :klantnaam");
      $sql->bindParam("klantid", $klantid);
      $sql->bindParam("klantnaam", $klantnaam);
      $sql->bindParam("klantadres", $klantadres);
      $sql->bindParam("klantpostcode", $klantpostcode);
      $sql->bindParam("klantwoonplaats", $klantwoonplaats);
      $sql->execute();

      echo "De klant is gewijzigd.<br/>";

    if (isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    } else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</box>
</body>
</html>