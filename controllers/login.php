<?php


if(isset($_SESSION['user_id']))
header('location : /dashboard');

global $db;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $username = trim(htmlspecialchars($username));
    $password = trim(htmlspecialchars($password));


    $user = $db->query("SELECT * FROM admins WHERE username = ?", [$username])->fetch();
    
    if ($user) {
        echo "0000" === $user['password'];

        if ($password === $user['password']) {

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: /dashboard");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

require "views/login.view.php";