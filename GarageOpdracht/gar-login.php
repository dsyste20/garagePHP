<?php
include ('gar-functions.php')
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="AKEisden">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gar-forms.css">
    <title>GARAGE|INLOGGEN</title>
</head>
<body>
<h1>INLOGGEN</h1>
  <section class="contact">
      <form method="post" action="gar-login.php" class="contact_form">
        <?php echo display_error() ?>
            <label>Username:</label>
            <input type="text" name="username"><br>
            <label>Password:</label>
            <input type="password" name="password"><br>
            <button type="submit" class="button" name="login_btn">Login</button>
        <p>Geen account? <a href="gar-signup.php">registreer</a></p>
      </form>
  </section>
</body>
</html>