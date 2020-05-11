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
    <link rel="stylesheet" type="text/css" href="css/gar-deleteform.css">
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
    <?php
        $gebruikers = $_POST['username'];
        require_once "gar-connect.php";

        $users = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $users->bindParam("username",$gebruikers);
        $users->execute();
        echo "<form action='gar-delete-users3.php' method='POST'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Username</td>";
        echo "<td>Email</td>";
        echo "<td>User_type</td>";
        echo "</tr>";
        foreach($users as $user) {
            echo "<tr>";
            echo "<td>".$user['id']."</td>";
            echo "<td>".$user['username']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "<td>".$user['user_type']."</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<input type='hidden' name='klantidvak' value=$gebruikers><br/>";
        echo "<input type='hidden' name='verwijdervak' value='0'>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "verwijder deze gebruiker. <br/><br>";
        echo "<input type='submit' name='verwijderen' value='Verwijderen'>";
        echo "</form>";
    ?>
</body>
</html>