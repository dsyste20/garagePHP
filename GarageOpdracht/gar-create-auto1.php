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
    <title>GARAGE|CREATE CAR</title>
</head>
<body>
<header>
    <h1>Create Car</h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<form action="gar-create-auto2.php" method="POST">
    <label>Autokenteken:</label>
    <input type="text" name="autokentekenvak"> <br/>
    <label>Automerk:</label>
    <input type="text" name="automerkvak"> <br/>
    <label>Autotype:</label>
    <input type="text" name="autotypevak"> <br/>
    <label>Autokmstand:</label>
    <input type="text" name="autokmstandvak"> <br/>
    <label>klantid:</label>
    <input type="text" name="klantidvak"> <br/>
    <input type="submit" name="verzenden" value="Verzenden">
</form>
</body>
</html>
