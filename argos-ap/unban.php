<?php
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }    
    rank::isAdmin();
    
    $id = $_GET['id'];
    $req = $DB->prepare("UPDATE users SET grade = 1 WHERE id = {$id}");
    $req->execute();
    header('location: ap-ban');
?>