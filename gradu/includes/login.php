<?php session_start() ;?>
<?php include"db.php";?>
<?php include"../admin/includes/functions.php";?>

<?php

if(isset($_POST['login'])){
    $user_name          = trim($_POST['user_name']);
    $user_password      = trim($_POST['user_password']);

    login_user($user_name , $user_password);

}





?>