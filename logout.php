<?php

@require_once 'php/include.php';
require_once('php/Userinfo.php');
$timestamp = date("Y-m-d H:i:s");
$log_message = $timestamp . " - " . $_SESSION['username'] . " disconnect " . "\n";
file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
session_start();
$_SESSION = array();
session_unset();
session_destroy();

header('location:https://argosproject.eu');

?>