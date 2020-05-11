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
    <title>GARAGE|EIGENAREN</title>
</head>
<body>
<header>
    <h1>All auto's met bijbehorende klanten</h1>
</header>
<box>
    <?php
    require_once "gar-connect.php";

    $dbs = $conn->prepare("SELECT auto.automerk, auto.klantid, klant.klantnaam FROM auto INNER JOIN  klant ON auto.klantid = klant.klantid");
    $dbs->execute();
    echo "<table>";
    echo "<tr>";
    echo "<th>Merk</th>";
    echo "<th> Klant ID</th>";
    echo "<th> Klantnaam</th>";
    echo "</tr>";
    foreach($dbs as $db) {
        echo "<tr>";
        echo "<td>".$db['automerk']."</td>";
        echo "<td>".$db['klantid']."</td>";
        echo "<td>".$db['klantnaam']."</td>";
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