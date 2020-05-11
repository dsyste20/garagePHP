<?php
include ('gar-functions.php');
if (!isAdmin()){
    $_SESSION['msg'] = "je moet ingelogd zijn";
    header('location: gar-login.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="AKEisden">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gar-profile.css">
    <title>GARAGE|PROFILE PAGE</title>
</head>
<body>

<header>
    <h1>Profile page</h1>
    <a href="gar-logout.php" class="button">logout</a>
    <?php
    if(isAdmin()) {
        echo "<a href=\"gar-create_user.php\" class=\"button\" style='margin-right: 10px'>Make User</a>";
    }
    ?>
</header>
<sidenav>
    <?php
    if(isAdmin()) {
        echo "<h2>Customer</h2>";
        echo "<ul>
        <li><a href=\"gar-create-klant1.php\">Create Customer</a></li>
        <li><a href=\"gar-read-klant.php\">All customers</a></li>
        <li><a href=\"gar-search-klant1.php\">Search Customer ID</a></li>
        <li><a href=\"gar-update-klant1.php\">Update Customer</a></li>
        <li><a href=\"gar-delete-klant1.php\">Delete Customer</a></li>
        </ul>";

        echo "<h2>Car</h2>";
        echo "<ul>
        <li><a href=\"gar-create-auto1.php\">Create Car</a></li>
        <li><a href=\"gar-read-auto.php\">All Cars</a></li>
        <li><a href=\"gar-search-auto1.php\">Search license Plate</a></li>
        <li><a href=\"gar-update-auto1.php\">Update Car</a></li>
        <li><a href=\"gar-delete-auto1.php\">Delete Car</a></li>
        </ul>";

        echo "<h2>Extra!</h2>";
        echo "<ul>
          <li><a href=\"gar-combi-klanntauto.php\">Auto Eigenaren</a></li>
          <li><a href=\"gar-autotypeEig1.php\">Autotypes</a></li>
         </ul>";
    }else {
        echo "<h2>Customer</h2>";
        echo "<li><a href=\"gar-read-klant.php\">All customers</a></li>
        <li><a href=\"gar-search-klant1.php\">Search Customer ID</a></li>";

        echo "<h2>Car</h2>";
        echo "<ul><li><a href=\"gar-read-auto.php\">All Cars</a></li>
        <li><a href=\"gar-search-auto1.php\">Search license Plate</a></li>
        </ul>";

        echo "<h2>User</h2>";
        echo "<ul><li><a href=\"gar-read-users.php\">All Users</a></li></ul>";

        echo "<h2>Extra!</h2>";
        echo "<ul>
          <li><a href=\"gar-combi-klanntauto.php\">Auto Eigenaren</a></li>
          <li><a href=\"gar-autotypeEig1.php\">Autotypes</a></li>
         </ul>";
    }
    ?>
</sidenav>
    <?php
        echo "<div class='white'>";
        if (isset($_SESSION['success'])) {
            echo "<p>".$_SESSION['success']."</p>";
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['user'])) {
            if(isset($_SESSION['user'])) {
                echo "<br><br><br>";
                echo "<section class='card'>";
                echo "<img src='css/images/autobedrijf.jpg' alt='Default'><br>";
                echo "<h1>".$_SESSION['user']['username']."</h1>";
                echo "<p class='title'>".$_SESSION['user']['email']."</p>";
                echo "<p>".ucfirst($_SESSION['user']['user_type'])."</p>";
                echo "<form action='gar-index2.php' method='POST'>";
                echo "<input type='submit' name='wijzigen' value='Wijzigen'>";
                echo "</form>";
            }
        }
        echo "</div>";
    ?>
</body>
</html>