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
    <title>GARAGE|DELETE CAR</title>
</head>
<body>
<header>
    <h1>Delete auto</h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<?php
$autokenteken = $_POST['autokentekenvak'];
require_once "gar-connect.php";

$autos = $conn->prepare("SELECT * FROM auto WHERE autokenteken = :autokenteken");
$autos->bindParam("autokenteken",$autokenteken);
$autos->execute();
$kenteken = $autos->rowCount();

if($kenteken < 1) {
    echo "<p>KENTEKEN BESTAAT NIET!</p>";
    echo "<a href='gar-delete-auto1.php' class='terug'> Terug</a>";
}else {
    echo "<form action='gar-delete-auto3.php' method='POST'>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Kenteken</th>";
    echo "<th>Merk</th>";
    echo "<th>Type</th>";
    echo "<th>KM Stand</th>";
    echo "<th> Klant ID</th>";
    echo "</tr>";
    foreach ($autos as $auto) {
        echo "<tr>";
        echo "<td>" . $auto['autokenteken'] . "</td>";
        echo "<td>" . $auto['automerk'] . "</td>";
        echo "<td>" . $auto['autotype'] . "</td>";
        echo "<td>" . $auto['autokmstand'] . "</td>";
        echo "<td>" . $auto['klantid'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<input type='hidden' name='autokentekenvak' value=$autokenteken><br/>";
    echo "<input type='hidden' name='verwijdervak' value='0'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "verwijder deze auto. <br/>";
    echo "<input type='submit' name='verwijderen' value='Verwijderen'>";
    echo "</form>";
}
?>
</body>
</html>
