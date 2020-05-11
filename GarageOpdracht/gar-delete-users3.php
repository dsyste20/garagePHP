<?php
include ('gar-functions.php');
if (!isLoggedIn()){
    $_SESSION['msg'] = "je moet ingelogd zijn";
    header('location: gar-login.php');

}
?>
<!Doctype html>
<html lang="nl">2
<head>
    <meta name="author" content="AKEisden">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gar-create-text.css">
    <title>GARAGE|DELETE USERS</title>
</head>
<body>
<header>
    <h1>Delete users</h1>
</header>
<box>
    <?php
//    $gebruikers = $_POST['username'];
    $verwijderen = $_POST['verwijdervak'];

    if ($verwijderen) {
        require "gar-connect.php";
        $gebruikers = $_POST['username'];

        $sql = $conn->prepare("DELETE FROM users WHERE username = :username");
        $sql->execute([':username' => $gebruikers]);

            echo "De user is verwijderd.<br/>";
    }else {
        echo "De user is niet verwijderd.<br/>";
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