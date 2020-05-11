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
    <link rel="stylesheet" type="text/css" href="css/gar-create.css">
    <title>GARAGE|CREATE KLANT</title>
</head>
<body>
<header>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
    <h1>Create Klant</h1>
</header>
<form action="gar-create-klant2.php" method="POST">
    <label>Klantnaam:</label>
    <input type="text" name="klantnaamvak"> <br/>
    <label>klantadres:</label>
    <input type="text" name="klantadresvak"> <br/>
    <label>klantposcode:</label>
    <input type="text" name="klantpostcodevak"> <br/>
    <label>klantplaats:</label>
    <input type="text" name="klantwoonplaatsvak"> <br/>
    <input type="submit" name="verzenden" value="Verzenden">
</form>
</body>
</html>
