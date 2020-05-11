<?php
include ('gar-functions.php')

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="AKEisden">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gar-forms.css">
    <title>GARAGE|CREATE USER</title>
</head>
<body>
<header>
    <h1>CREATE NEW USER</h1>

</header>
  <section class="contact">
    <form method="post" action="gar-create_user.php" class="contact_form">
      <?php echo display_error() ?>
        <label>Username: </label>
        <input type="text" name="username" value="<?php echo $username; ?>"><br>
        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $email;?>"><br>
        <label>User type: </label>
        <select name="user_type" id="user_type">
            <option value=""></option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>
        <label>Password: </label>
        <input type="password" name="password_1"><br>
        <label>Confirm Password: </label>
        <input type="password" name="password_2"><br>
        <input type="submit" class="button" name="register_btn" value="Create User"><br>
        <a href="gar-read-users.php" class="button">All Users</a>
        <a href="gar-delete-users1.php" class="button">Delete User</a><br><br>
        <?php
        if(isAdmin()) {
            echo "<a href='gar-admin.php' class='button'>Menu</a>";
        }else {
            echo "<a href='gar-index.php' class='button'>Menu</a>";
        }
        ?>
    </form>
  </section>
</body>
</html>
