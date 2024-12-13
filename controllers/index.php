<?php
session_start();
if(isset($_SESSION['user_id']))
header('location : /dashboard');
global $db;

$packages = $db->query('select * from packages')->fetchAll(PDO::FETCH_ASSOC);

require "views/index.view.php";
