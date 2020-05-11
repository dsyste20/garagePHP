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
    <title>GARAGE|UPDATE KLANT</title>
</head>
<body>
<header>
    <h1>Update Klant</h1>
    <?php
    if(isAdmin()) {
        echo "<a href='gar-admin.php' class='button'>Menu</a>";
    }else {
        echo "<a href='gar-index.php' class='button'>Menu</a>";
    }
    ?>
</header>
<main>
  <form action="gar-update-klant2.php" method="POST">
      Welke klant wilt u wijzigen? (ID)
      <input type="text" name="klantidvak">
      <input type="submit" name="wijzigen" value="Wijzigen">
  </form>
</main>
</body>
</html>