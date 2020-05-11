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
<form action="gar-update-auto2.php" method="POST">
    Welke auto wilt u wijzigen? (kenteken):
    <input type="text" name="autokentekenvak">
    <input type="submit" name="wijzigen" value="Wijzigen">
</form>
</body>
</html>