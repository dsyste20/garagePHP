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
    <title>GARAGE|AUTO ZOEKEN</title>
</head>
<body>
<header>
    <h1>Zoeken Kenteken </h1>
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
      $autokenteken = $_POST['autokentekenvak'];

      require_once "gar-connect.php";

      $autos = $conn->prepare("SELECT * FROM auto WHERE autokenteken = :autokenteken");
      $autos->bindParam("autokenteken",$autokenteken);
      $autos->execute();
      $kenteken = $autos->rowCount();

    if($kenteken < 1) {
        echo "<p>KENTEKEN BESTAAT NIET!</p>";
        echo "<a href='gar-search-auto1.php' class='terug'> Try again<br></a>";
    }else {
        echo "<box>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Kenteken</th>";
        echo "<th>Merk</th>";
        echo "<th>Type</th>";
        echo "<th>KM Stand</th>";
        echo "<th>ID</th>";
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
        echo "</table><br/>";
        echo "</box>";
    }
    ?>
</main>
</body>
</html>
