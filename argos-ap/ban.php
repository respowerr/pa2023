<?php
    date_default_timezone_set('Europe/Paris');
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }
    
    rank::isAdmin();
    $ban_date = date('Y-m-d H:i:s');

    $id = $_GET['id'];

    $req = $DB->prepare("UPDATE users SET grade = 6, ban_date = ? WHERE id = ?");
    $req->execute(array($ban_date, $id));
    header('Location: ap-users.php');
    exit();
?>
