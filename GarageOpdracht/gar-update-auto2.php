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
    <title>GARAGE|UPDATE AUTO</title>
</head>
<body>
<header>
    <h1>Update auto</h1>
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
    $autos->bindParam("autokenteken", $autokenteken);
    $autos->execute();
    $kenteken = $autos->rowCount();

    foreach ($autos as $auto) {
        echo "<form action='gar-update-auto3.php' method='POST'>";
        echo "<strong style='color: red'>Wijzig hier alles wat u wilt.</strong><br>";

        echo "autokenteken:";
        echo "<input type='text' name='autokentekenvak' value='" . $auto['autokenteken'] . "'><br/>";

        echo "automerk:";
        echo "<input type='text' name='automerkvak' value='" . $auto['automerk'] . "'><br/>";

        echo "autotype:";
        echo "<input type='text' name='autotypevak' value='" . $auto['autotype'] . "'><br/>";

        echo "autokmstand:";
        echo "<input type='text' name='autokmstandvak' value='" . $auto['autokmstand'] . "'><br/>";

        echo "klantid: ";
        echo "<input type='text' name='klantidvak' value='" . $auto['klantid'] . "'><br/>";

        echo "<input type='submit' name='wijzigen' value='Wijzigen'>";
        echo "</form>";
    }

    if($kenteken < 1) {
        echo "<p>KENTEKEN BESTAAT NIET!</p>";
        echo "<a href='gar-update-auto1.php' class='terug'> Terug</a>";
    }
?>
</body>
</html>