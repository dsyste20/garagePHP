<?php
include ('gar-functions.php');

session_start();
session_destroy();
unset($_SESSION['user']);

header('location: gar-login.php');
?>
