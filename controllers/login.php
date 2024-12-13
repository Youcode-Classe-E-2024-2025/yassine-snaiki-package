<?php
// Database connection

if(isset($_SESSION['user_id']))
header('location : /dashboard');


require "db.php";
$db = new Database($dsn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    $username = trim(htmlspecialchars($username));
    $password = trim(htmlspecialchars($password));

    // Fetch the user from the database
    $user = $db->query("SELECT * FROM admins WHERE username = ?", [$username])->fetch();
    
    if ($user) {
        echo "0000" === $user['password'];
        // Verify password
        if ($password === $user['password']) {
            // Successful login
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to dashboard
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