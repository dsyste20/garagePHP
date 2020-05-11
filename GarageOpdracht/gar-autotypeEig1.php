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
    <title>GARAGE|AUTOTYPES</title>
</head>
<body>
<?php
if(isAdmin()) {
    echo "<a href='gar-admin.php' class='button'>Menu</a>";
}else {
    echo "<a href='gar-index.php' class='button'>Menu</a>";
}
?>
<h1>Zoeken autotype </h1>
<form action="gar-autotypeEig2.php" method="POST">
    <label>Welke autotype zoekt u?</label><br/>
    <input type="text" name="autotypevak">
    <input type="submit" name="zoeken" value="Zoeken">
</form>
</body>
</html>