<?php
session_start();

// connectie naar database
$db = mysqli_connect('localhost', 'root', '', 'garage');

$username = "";
$email = "";
$errors = array();

if(isset($_POST['register_btn'])){
    register();
}

function register(){

    global $db, $username, $email, $errors;


    $username = e($_POST['username']);
    $email = e($_POST['email']);
    $password_1 = e($_POST['password_1']);
    $password_2 = e($_POST['password_2']);

    if(empty($username)){
        array_push($errors, "username is required");
    }
    if(empty($email)){
        array_push($errors, "email is required");
    }
    if(empty($password_1)){
        array_push($errors, "password is required");
    }
    if(empty($password_2)){
        array_push($errors, "passwords do not match");
    }

    if(count($errors) == 0) {

        $password = md5($password_1);


        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);

            $query = "INSERT INTO users (username, email, user_type, password)
                   VALUES('$username', '$email', '$user_type', '$password')";
            mysqli_query($db, $query);
            $_SESSION['success'] = "new user succes";
            header('location: gar-admin.php');

        } else {
            $query = "INSERT INTO users (username, email, user_type, password)
                   VALUES('$username', '$email', 'user', '$password')";
            mysqli_query($db, $query);

            $logged_in = mysqli_insert_id($db);
            $_SESSION['user'] = getUserById($logged_in);
            $_SESSION['success'] = "Je bent ingelogd!";
            header('location: gar-admin.php');
        }
    }

}

function getUserById($id){
    global $db;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;

}
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
function display_error(){
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">';
        foreach($errors as $error){
            echo $error. '<br>';
        }
        echo '</div>';

    }}

function isLoggedIn(){

    if(isset($_SESSION['user'])){
        return true;
    }else{
        return false;
    }
}
if(isset($_Get['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header("location: gar-login.php");
}
if(isset($_POST['login_btn'])){
    login();
}
function login(){
    global $db, $username, $errors;

    $username = e($_POST['username']);
    $password = e($_POST['password']);


    if (empty($username)){
        array_push($errors, "username is required");
    }
    if (empty($password)){
        array_push($errors, "password is required");
    }

    if(count($errors) == 0){
        $password = md5($password);


        $query = "SELECT * FROM users WHERE username ='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($db,$query);

        if(mysqli_num_rows($results) ==1){
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin'){

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "je bent ingelogd";
                header('location: gar-admin.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "je bent ingelogd";

                header("location: gar-index.php");
            }
        }else {
            array_push($errors, "wrong username/password");
        }
    }
}
function isAdmin(){
    if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
        return true;

    }else{
        return false;
    }
}
?>