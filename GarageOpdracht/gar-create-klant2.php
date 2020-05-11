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
    <title>GARAGE|CREATE KLANT</title>
</head>
<body>
<header>
    <h1>Create Klant</h1>
</header>
<box>
  <?php
    $klantid = NULL;
    $klantnaam = $_POST['klantnaamvak'];
    $klantadres = $_POST['klantadresvak'];
    $klantpostcode = $_POST['klantpostcodevak'];
    $klantwoonplaats = $_POST['klantwoonplaatsvak'];

    require_once "gar-connect.php";

    $sql = $conn->prepare("INSERT into klant values (:klantid, :klantnaam, :klantadres, :klantpostcode, :klantwoonplaats)");
    $sql->execute(["klantid" => $klantid, "klantnaam" => $klantnaam, "klantadres" => $klantadres,
        "klantpostcode" => $klantpostcode, "klantwoonplaats" => $klantwoonplaats]);

    echo "De klant is toegevoegd<br><br>";
  if (isAdmin()) {
      echo "<a href='gar-admin.php' class='button'>Menu</a>";
  } else {
      echo "<a href='gar-index.php' class='button'>Menu</a>";
  }
  ?>
</box>
</body>
</html>
