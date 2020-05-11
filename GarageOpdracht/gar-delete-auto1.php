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
    <title>GARAGE|DELETE CAR</title>
</head>
<body>
<header>
    <h1>Delete a car </h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<form action="gar-delete-auto2.php" method="POST">
    Welk Kenteken wilt u verwijderen?<br>
    <input type="text" name="autokentekenvak">
    <input type="submit" name="verwijderen" value="Verwijderen">
</form>
</body>
</html>