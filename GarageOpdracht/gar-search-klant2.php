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
    <title>GARAGE|KLANT ZOEKEN</title>
</head>
<body>
<header>
    <h1>Zoeken Klant ID </h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<main>
    <?php
      $klantid = $_POST['klantidvak'];

      require_once "gar-connect.php";

      $klanten = $conn->prepare("SELECT * FROM klant WHERE klantid = :klantid");
      $klanten->bindParam("klantid",$klantid);
      $klanten->execute();
      $id = $klanten->rowCount();

    if($id < 1) {
        echo "<p>ID BESTAAT NIET!</p>";
        echo "<a href='gar-search-klant1.php' class='terug'> Try again</a><br>";
    }else {
        echo "<box>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Naam</th>";
        echo "<th>Adres</th>";
        echo "<th>Postcode</th>";
        echo "<th>Woonplaats</th>";
        echo "</tr>";
        foreach ($klanten as $klant) {
            echo "<tr>";
            echo "<td>" . $klant['klantid'] . "</td>";
            echo "<td>" . $klant['klantnaam'] . "</td>";
            echo "<td>" . $klant['klantadres'] . "</td>";
            echo "<td>" . $klant['klantpostcode'] . "</td>";
            echo "<td>" . $klant['klantwoonplaats'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br/>";
        echo "</box>";
    }
    ?>
</main>
</body>
</html>
