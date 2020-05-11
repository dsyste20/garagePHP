<?php
include ('gar-functions.php')

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="AKEisden">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gar-forms.css">
    <title>GARAGE|REGISTREREN</title>
</head>
<body>
<h1>SIGN-UP</h1>
  <section class="contact">
    <form method="post" action="gar-signup.php" class="contact_form">
        <?php echo display_error() ?>
            <label>Username:</label>
            <input type="text" name="username"><br>
            <label>Email:</label>
            <input type="text" name="email"><br>
            <label>User type: </label>
            <select name="user_type" id="user_type">
                <option value=""></option>
                <option value="user">User</option>
            </select><br>
            <label>Password:</label>
            <input type="text" name="password_1"><br>
            <label>Confirm Password:</label>
            <input type="text" name="password_2"><br>
            <button type="submit" class="button" name="register_btn">Register</button>
        <p>Heb je al een account? <a href="gar-login.php">login</a></p>
    </form>
  </section>
</body>
</html>

