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
    <title>GARAGE|DELETE USERS</title>
</head>
<body>
<header>
    <h1>Delete user</h1>
    <?php
        if(isAdmin()) {
            echo "<a href='gar-admin.php' class='button'>Menu</a>";
        }else {
            echo "<a href='gar-index.php' class='button'>Menu</a>";
        }
    ?>
</header>
<form action="gar-delete-users2.php" method="POST">
    Welk gebruiker wilt u verwijderen?<br>
    <input type="text" name="username">
    <input type="submit" name="verder" value="Verder">
</form>
</body>
</html>