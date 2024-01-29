<?php
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }    
    rank::isAdmin();
$crank = $_GET['choix'];
$id = $_GET['id'];

switch($crank){
    case 'choix1':
        $req = $DB->prepare("UPDATE users SET grade = 1 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
    case 'choix2':
        $req = $DB->prepare("UPDATE users SET grade = 2 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
    case 'choix3':
        $req = $DB->prepare("UPDATE users SET grade = 3 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
    case 'choix4':
        $req = $DB->prepare("UPDATE users SET grade = 4 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
    case 'choix5':
        $req = $DB->prepare("UPDATE users SET grade = 5 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
    case 'choix6':
        $req = $DB->prepare("UPDATE users SET grade = 9 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
    case 'choix7':
        $req = $DB->prepare("UPDATE users SET grade = 10 WHERE id = {$id}");
        $req->execute();
        header('location: ap-users');
        break;
}


?>