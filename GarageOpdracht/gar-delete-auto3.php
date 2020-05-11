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
    <title>GARAGE|DELETE CAR</title>
</head>
<body>
<header>
    <h1>Delete auto</h1>
</header>
<box>
    <?php
    $autokenteken = $_POST['autokentekenvak'];
    $verwijderen = $_POST['verwijdervak'];

    if($verwijderen) {
        require "gar-connect.php";
        $sql = $conn->prepare("DELETE FROM auto WHERE autokenteken = :autokenteken");
        $sql->bindParam("autokenteken", $autokenteken);
        $sql->execute();

        echo "De gegevens zijn verwijderd.<br/>";
    }else {
        echo "De gegevens zijn niet verwijderd.<br/>";
    }
    if (isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    } else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</box>
</body>
</html>
