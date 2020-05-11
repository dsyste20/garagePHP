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
    <title>GARAGE|AUTOS</title>
</head>
<body>
<header>
    <h1>All auto's</h1>
</header>
<box>
    <?php
    require_once "gar-connect.php";

    $autos = $conn->prepare("SELECT * FROM auto");
    $autos->execute();
    echo "<table>";
        echo "<tr>";
        echo "<th>Kenteken</th>";
        echo "<th>Merk</th>";
        echo "<th>Type</th>";
        echo "<th>KM Stand</th>";
        echo "<th> Klant ID</th>";
        echo "</tr>";
    foreach($autos as $auto) {
        echo "<tr>";
        echo "<td>".$auto['autokenteken']."</td>";
        echo "<td>".$auto['automerk']."</td>";
        echo "<td>".$auto['autotype']."</td>";
        echo "<td>".$auto['autokmstand']."</td>";
        echo "<td>".$auto['klantid']."</td>";
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
