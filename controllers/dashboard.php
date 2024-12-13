<?php
require "db.php";

session_start();
// unset($_SESSION['user_id']);
// unset($_SESSION['username']);
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {

    header("Location: /login");
    exit();
}
$db = new Database($dsn);
$packages = $db->query('select * from packages')->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = trim(htmlspecialchars($_POST['name'])); 
    $pdescription = trim(htmlspecialchars($_POST['description']));
    
    if (!empty($pname) && !empty($pdescription)) {
        $db->query('INSERT INTO packages(name, description) VALUES(?, ?)', [$pname, $pdescription]);
    }
    
    header("Location: /dashboard");
    exit();
}

require "views/index.view.php";