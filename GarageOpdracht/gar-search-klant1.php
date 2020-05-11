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
    <title>GARAGE|KLANT ZOEKEN</title>
</head>
<body>
<header>
    <h1>Zoeken Klant ID </h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<form action="gar-search-klant2.php" method="POST">
    <label>Welke klantid zoekt u?</label><br/>
    <input type="text" name="klantidvak">
    <input type="submit" name="zoeken" value="Zoeken">
</form>
</body>
</html>