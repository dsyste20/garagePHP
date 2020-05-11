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
    <title>GARAGE|DELETE KLANT</title>
</head>
<body>
<header>
    <h1>Delete klant</h1>
</header>
<box>
    <?php
      $klantid = $_POST['klantidvak'];
      $verwijderen = $_POST['verwijdervak'];
      require_once "gar-connect.php";

      if($verwijderen) {
          $klanten = $conn->prepare("SELECT * FROM auto WHERE klantid = :klantid");
          $klanten->bindParam("klantid", $klantid);
          $klanten->execute();
          $id = $klanten->fetch(PDO::FETCH_ASSOC);
          if(!$id) {
              $sql = $conn->prepare("DELETE FROM klant WHERE klantid = :klantid");
              $sql->bindParam("klantid", $klantid);
              $sql->execute();

              echo "De gegevens zijn verwijderd.<br/>";
          }else {
              echo "Kan niet verwijderen, Klant heeft nog een bestaande auto!!<br>";
              echo "<a href='gar-delete-klant1.php'>Terug</a><br><br>";
          }
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