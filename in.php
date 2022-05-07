<?php
session_start();
$user = $_REQUEST['username'];
$password = $_REQUEST['password'];
$db = json_decode(file_get_contents('data.json'), 1);

foreach ($db as $value) {
    if ($user == $value['user'] and $password == $value['password']) {
        setcookie('user', $value['user'], time()+1000000000);
        header('location: ./index.php'); return;
    }
}

?>