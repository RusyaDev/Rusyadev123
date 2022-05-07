<?php
  session_start();
if($_REQUEST['username'] == NULL){
        $_SESSION['us'] = "usernameni toldring";
        header('location: signup.php');
        return;
}
if($_REQUEST['email'] == NULL){
        $_SESSION['em'] = "emailni toldring";
        header('location: signup.php');
        return;
}
if($_REQUEST['password'] == NULL){
        $_SESSION['pas'] = "parolni toldring";
        header('location: signup.php');
        return;
}
$user = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$db_user = json_decode(file_get_contents('data.json'), 1);

$db_users = array_column($db_user, 'user');
$db_emails = array_column($db_user, 'email');

if (!in_array($user, $db_users)) {
    if(!in_array($email, $db_emails)) {
        $db_user[] = [
            'user' => $user,
            'password' => $password,
        ];
        file_put_contents('data.json', json_encode($db_user));
        $_SESSION['reg'] = "Siz Registraciya boldingiz";
        header("location: signin.php");  
    }else{
            $_SESSION['em'] = "Bu Email band";
        header("location: signup.php");    
    }
} else{
        $_SESSION['us'] = "Bu User band";
        header("location: signup.php");   
}
?>