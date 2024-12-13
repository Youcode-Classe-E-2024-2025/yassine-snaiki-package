<?php
session_start();
if(isset($_SESSION['user_id']))
header('location : /dashboard');
global $db;
// require "db.php";
// $dsn = 'pgsql:host=localhost;port=8885;dbname=packagesdb2;user=postgres;password=0000;';
// $db = new Database($dsn);

$packages = $db->query('select * from packages')->fetchAll(PDO::FETCH_ASSOC);

require "views/index.view.php";
