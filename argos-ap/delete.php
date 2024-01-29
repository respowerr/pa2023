<?php
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }
    
    rank::isAdmin();

    $id = $_GET['id'];
    session_id($id);
    session_start();
    session_destroy();
    $verifrank = $DB->prepare("SELECT grade FROM users WHERE id = ?");
    $verifrank->execute(array($id));
    $ver = $verifrank->fetch();
    $spock = $ver['grade'];
    if ($spock == 8 || $spock == 9 || $spock == 10) {
        header("location: https://argosproject.eu/argos-ap/ap-users");
    } else {
        $rmv = $DB->prepare("DELETE FROM users WHERE id = ?");
        $rmv->execute(array($id));
        header("location: https://argosproject.eu/argos-ap/ap-users");
    }

?>