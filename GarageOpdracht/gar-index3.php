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
    <title>GARAGE|PROFILE PAGE</title>
</head>
<body>
<header>
    <h1>Update user</h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<box>
    <?php
    $username = $_POST['gebruikersnaamvak'];
    $email = $_POST['emailvak'];
    $pass = $_POST['passwordvak'];

    require_once "gar-connect.php";

    $sql = $conn->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");
    $sql->bindParam("username", $username);
    $sql->bindParam("email", $email);
    $sql->bindParam("password", $pass);
    $sql->execute();

    echo "Gegevens zijn gewijzigd.<br/>";
    ?>
</box>
</body>
</html>