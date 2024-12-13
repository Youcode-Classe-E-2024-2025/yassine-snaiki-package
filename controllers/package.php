<?php 
session_start();

global $db;


$packageQuery = 'select * from packages where id = ?';
$authorsQuery = 'select * from authors a join author_package ap on a.id = ap.author_id where ap.package_id = ?';
$versionsQuery = 'select * from versions where package_id = ?';


$package = $db->query($packageQuery, [$_GET['id']])->fetch();
if(!$package) {
    header('Location: /404');
    exit();
}


$versions = $db->query($versionsQuery,[$_GET['id']])->fetchAll(PDO::FETCH_ASSOC);
$authors = $db->query($authorsQuery,[$_GET['id']])->fetchAll(PDO::FETCH_ASSOC);
$allAuthors = $db->query('SELECT * from authors')->fetchAll(PDO::FETCH_ASSOC);


$deleteVersionQuery = 'DELETE FROM versions WHERE id = ?';
$deleteAuthorQuery = 'DELETE FROM author_package WHERE id = ?';

$newAuthQuery = 'INSERT INTO authors(name, email) VALUES (?, ?) RETURNING id';
$linkAuthQuery = 'INSERT INTO author_package(author_id,package_id) VALUES (?, ?)';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {

        header("Location: /login");
        exit();
    }
    if($_POST['hidden'] === 'version') {
        $version = $_POST['version'];
        $date = $_POST['date'];
        if(!empty($version) && !empty($date)) {
            $db->query("INSERT INTO versions(release_date,name,package_id) values(?,?,?)",[$date,$version,$_GET['id']]);
        }
    }
    if($_POST['hidden'] === 'author') {
        $author = $_POST['author'];
        if(!empty($author)) {
           $db->query("INSERT INTO author_package(author_id,package_id) values(?,?)",[$author,$_GET['id']]);
        }
    }
    if($_POST['hidden'] === 'delete_version') {
        $id = $_POST['version_id'];
        if(!empty($id)) {
            $db->query($deleteVersionQuery,[$id]);
        }
    }
    if($_POST['hidden'] === 'delete_author') {
        $id = $_POST['author_id'];
        if(!empty($id)) {
            $db->query($deleteAuthorQuery,[$id]);
        }
    }
    if($_POST['hidden'] === 'new_author') {
        $name = $_POST['new-auth'];
        $email = $_POST['new-email'];
        if(!empty($name) && !empty($email)) {
            $id =$db->query($newAuthQuery,[$name,$email])->fetchColumn();
            $db->query($linkAuthQuery,[$id,$_GET['id']]);
        }
    }
    if($_POST['hidden'] === 'delete_package') {
            $db->query('DELETE FROM packages where id = ?',[$_GET['id']]);
            header("Location: /");
            exit();
    }
    header("Location: /package?id={$_GET['id']}");
    exit();
}






require "views/package.view.php";