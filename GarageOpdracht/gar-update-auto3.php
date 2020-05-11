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
    <title>GARAGE|UPDATE AUTO</title>
</head>
<body>
<header>
    <h1>Update auto</h1>
</header>
<box>
    <?php
    $klantid = $_POST['klantidvak'];
    $autokenteken = $_POST['autokentekenvak'];
    $automerk = $_POST['automerkvak'];
    $autotype = $_POST['autotypevak'];
    $autokmstand = $_POST['autokmstandvak'];

    require_once "gar-connect.php";

    $sql = $conn->prepare("UPDATE auto SET automerk = :automerk, autotype = :autotype, autokmstand = :autokmstand, klantid = :klantid WHERE autokenteken = :autokenteken");
    $sql->execute(["autokenteken" => $autokenteken, "automerk" => $automerk, "autotype" => $autotype, "autokmstand" => $autokmstand, "klantid" => $klantid]);

    echo "De auto is gewijzigd.<br/>";
    if (isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    } else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</box>
</body>
</html>