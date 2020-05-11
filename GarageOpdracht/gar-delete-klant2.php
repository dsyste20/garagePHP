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
    <link rel="stylesheet" type="text/css" href="css/gar-deleteform.css">
    <title>GARAGE|DELETE KLANT</title>
</head>
<body>
<header>
    <h1>Delete Klant</h1>
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

if($id < 1) {
    echo "<p>ID BESTAAT NIET!</p>";
    echo "<a href='gar-delete-klant1.php' class='terug'> Terug</a>";
}else {
    echo "<form action='gar-delete-klant3.php' method='POST'>";
    echo "<table>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Naam</td>";
    echo "<td>Adres</td>";
    echo "<td>Postcode</td>";
    echo "<td>Woonplaats</td>";
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
    echo "</table>";

    echo "<input type='hidden' name='klantidvak' value=$klantid><br/>";
    echo "<input type='hidden' name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "verwijder deze klant. <br/><br>";
    echo "<input type='submit' name='verwijderen' value='Verwijderen'>";
    echo "</form>";
}
?>
</body>
</html>