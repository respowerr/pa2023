<?php
session_start();


$timeout = 10;

if(!isset($_SESSION['last_visit'])) {
    $_SESSION['last_visit'] = time(); 
} 

if(time() - $_SESSION['last_visit'] > $timeout) {
    $_SESSION['visiteurs'] = 1; 
    $filename = 'mtn.txt';
    file_put_contents($filename, '');
} else {
    if(!isset($_SESSION['visiteurs'])) {
        $_SESSION['visiteurs'] = 1;
    } else {
        $_SESSION['visiteurs']++;
    }
}

$_SESSION['last_visit'] = time();

$filename = 'mtn.txt';
file_put_contents($filename, $_SESSION['visiteurs']);

$allowed_ips = $site_config['allowed_ips'];

if ($site_config['maintenance'] && !in_array($ip, $allowed_ips)) {
    header('Location: welcomemaintenance');
    exit();
}
?>
