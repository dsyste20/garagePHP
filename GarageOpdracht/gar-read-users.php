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
    <link rel="stylesheet" type="text/css" href="css/gar-read.css">
    <title>GARAGE|USERS</title>
</head>
<body>
<header>
    <h1>Alle USERS</h1>
</header>
<box>
    <?php
    require_once "gar-connect.php";

    $klanten = $conn->prepare("SELECT * FROM users");
    $klanten->execute();
    echo "<table>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Username</td>";
    echo "<td>Email</td>";
    echo "<td>User_type</td>";
    echo "</tr>";
    foreach($klanten as $klant) {
        echo "<tr>";
        echo "<td>".$klant['id']."</td>";
        echo "<td>".$klant['username']."</td>";
        echo "<td>".$klant['email']."</td>";
        echo "<td>".$klant['user_type']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    if (isAdmin()) {
        echo "<br><a href='gar-admin.php' class='button'>Menu</a>";
    } else {
        echo "<br><a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</box>
</body>
</html>