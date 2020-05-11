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
    <link rel="stylesheet" type="text/css" href="css/gar-search.css">
    <title>GARAGE|UPDATE KLANT</title>
</head>
<body>
<header>
    <h1>Update Klant</h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
  <?php
    $klantid = $_POST['klantidvak'];
    require_once "gar-connect.php";

    $klanten = $conn->prepare("SELECT * FROM klant WHERE klantid = :klantid");
    $klanten->bindParam("klantid",$klantid);
    $klanten->execute();
    $id = $klanten->rowCount();

        foreach ($klanten as $klant) {
            echo "<form action='gar-update-klant3.php' method='POST'>";
            echo "<strong style='color: red'>Wijzig hier alles wat u wilt.</strong><br>";

            echo "<strong>KLANTID:</strong> " . $klant['klantid'];
            echo "<input type='hidden' name='klantidvak' value='" . $klant['klantid'] . "'><br/>";

            echo "<strong>NAAM:</strong>";
            echo "<input type='text' name='klantnaamvak' value='" . $klant['klantnaam'] . "'><br/>";

            echo "<strong>ADRES:</strong>";
            echo "<input type='text' name='klantadresvak' value='" . $klant['klantadres'] . "'><br/>";

            echo "<strong>POSTCODE:</strong>";
            echo "<input type='text' name='klantpostcodevak' value='" . $klant['klantpostcode'] . "'><br/>";

            echo "<strong>WOONPLAATS:</strong>";
            echo "<input type='text' name='klantwoonplaatsvak' value='" . $klant['klantwoonplaats'] . "'><br/>";

            echo "<input type='submit' name='wijzigen' value='Wijzigen'>";
            echo "</form>";
        }

  if($id < 1) {
      echo "<p>ID BESTAAT NIET!</p>";
      echo "<a href='gar-update-klant1.php' class='terug'> Terug</a>";
  }
   ?>
</body>
</html>
