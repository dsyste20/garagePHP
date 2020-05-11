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
    <title>GARAGE|AUTOTYPES</title>
</head>
<body>
<header>
    <h1>Zoeken autotype </h1>
</header>
<box>
    <?php
    $autotype = $_POST['autotypevak'];
    require_once "gar-connect.php";

    $dbs = $conn->prepare("SELECT auto.autokenteken, auto.automerk, auto.autotype, 
                          auto.klantid, klant.klantnaam, klant.klantadres FROM auto INNER JOIN  klant ON 
                          auto.klantid = klant.klantid WHERE autotype = :autotype");
    $dbs->bindParam("autotype",$autotype);
    $dbs->execute();
    echo "<table>";
    echo "<tr>";
    echo "<th>Auto type</th>";
    echo "<th>Auto merk</th>";
    echo "<th>Kenteken</th>";
    echo "<th> Klant ID</th>";
    echo "<th> Klantnaam</th>";
    echo "<th>Klantadres</th>";
    echo "</tr>";
    foreach($dbs as $db) {
        echo "<tr>";
        echo "<td>".$db['autotype']."</td>";
        echo "<td>".$db['automerk']."</td>";
        echo "<td>".$db['autokenteken']."</td>";
        echo "<td>".$db['klantid']."</td>";
        echo "<td>".$db['klantnaam']."</td>";
        echo "<td>".$db['klantadres']."</td>";
        echo "</tr>";
    }
    echo "</table><br>";
    if(isAdmin()) {
        echo "<br><a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<br><a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</box>
</body>
</html>