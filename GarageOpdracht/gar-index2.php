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
    <link rel="stylesheet" type="text/css" href="css/gar-profile.css">
    <title>GARAGE|PROFILE PAGE</title>
</head>
<body>
<header>
    <h1>Update user</h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='menu'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='menu'>Menu</a>";
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
        echo"<h2>Customer</h2>";
        echo "<ul><li><a href=\"gar-read-klant.php\">All customers</a></li>
        <li><a href=\"gar-search-klant1.php\">Search Customer ID</a></li>
        </ul>";

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
echo "<br>";
  echo "<div class='card'>";
    echo "<img src=\"css/images/autobedrijf.jpg\"><br>";
    echo "<form action='gar-upload-pic.php'>
      <input type='file' name='filename'><br>
      <input type='submit' name='veranderen' value='Veranderen'>
    </form><br>";
    echo "<p>Wijzig hier alles wat u wilt.</p>";
    echo "<form action='gar-index3.php' method='POST'>";

        echo "Gebruikersnaam:";
        echo "<input type='text' name='gebruikersnaamvak' value='".$_SESSION['user']['username']."'><br/>";

        echo "E-mail:";
        echo "<input type='email' name='emailvak' value='".$_SESSION['user']['email']."'><br/>";

        echo "Password:";
        echo "<input type='password' name='passwordvak'><br/><br>";

        echo "<input type='submit' name='wijzigen' value='Wijzigen'>";
    echo "</form>";
  echo "</div>";
echo "</div>";
?>
</body>
</html>