<?php

require_once('include.php'); // Login SQL
require_once('../mtn.php');
$config_file = '../mtn.php';
foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
    include $filename;
}    
rank::isAdmin();

// charger les adresses IP autorisées depuis le fichier de configuration
if (file_exists($config_file)) {
    include($config_file);
    $allowed_ips = isset($site_config['allowed_ips']) ? $site_config['allowed_ips'] : array();
} else {
    $allowed_ips = array();
}

if (isset($_POST['maintenance_toggle'])) {
    $site_config['maintenance'] = !$site_config['maintenance'];
    if ($site_config['maintenance']) {
        $site_config['maintenance_start'] = time();
    } else {
        unset($site_config['maintenance_start']);
    }
    file_put_contents('../mtn.php', '<?php $site_config = ' . var_export($site_config, true) . '; ?>');
}
date_default_timezone_set('Europe/Paris');

if (isset($_POST['add_ip']) && !empty($_SERVER['REMOTE_ADDR'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!in_array($ip, $allowed_ips)) {
        $allowed_ips[] = $ip;
        $ipmsg = "IP $ip ajoutée !";
        
        file_put_contents($config_file, '<?php $site_config[\'allowed_ips\'] = ' . var_export($allowed_ips, true) . '; ?>');
    } else {
        $ipmsg = "IP $ip existe déjà !";
    }
}
$filename = '../mtn.txt';
$visiteurs = file_get_contents($filename);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta lang="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminpanel.css">
    <link rel="icon" type="image/png" href="../img/interface/icon2.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Panel</title>
    
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
        <div style="text-align: center;"><a href="ap-home"><img src="../img/interface/admin-svg-white.png" class="logo"></a></div>
            <ul>
                <li><a href="ap-home"><i class="fas fa-solid fa-chart-line"></i>Dashboard</a></li>
                <li><a href="ap-users"><i class="fas fa-solid fa-users"></i>Users</a></li>
                <li style="background-color: #2f30386d;"><a href="ap-maintenance"><i class="fas fa-solid fa-hourglass-start"></i>Maintenance</a></li>
                <li><a href="ap-admin"><i class="fas fa-solid fa-jedi"></i>Newsletter</a></li>
                <li><a href="ap-logs"><i class="fas fa-solid fa-book-journal-whills"></i>Logs</a></li>
                <li><a href="ap-sub"><i class="fas fa-solid fa-award"></i>Subscription</a></li>
                <li><a href="ap-ban"><i class="fas fa-solid fa-ban"></i>Banished</a></li>
                <li><a href="ap-status"><i class="fas fa-solid fa-server"></i>Server</a></li>
                <li class="return"><a href="https://argosproject.eu"><i class="fas fa-solid fa-arrow-left-long"></i>Return to Argos</a></li>
            </ul> 
        </div>
        <div class="main_content">
        <section style="text-align: center; margin-top: 80px;">
        <span id="mtntime" style="color: white; font-size: 100px; font-family: 'Orbitron', sans-serif;"><?= $mtntime?></span>
        </section>

        <section style="text-align: center;">
    <form method="post" style="display: inline-block;">
        <button type="submit" name="maintenance_toggle" value="toggle" style="background-color: #26272b; border: 1px solid white; padding: 10px; color: white; font-size: 20px;">
            <?php
                if ($site_config['maintenance']) {
                    echo "Deactivate maintenance";
                } else {
                    echo "Activate maintenance";
                }
            ?>
        </button>
    </form>
    <form method="post" style="display: inline-block;">
        <input type="submit" name="add_ip" value="Ajouter mon IP" style="background-color: #26272b; border: 1px solid white; padding: 10px; color: white; font-size: 20px;">
    </form>
</section>
<section style="text-align: center; margin-top: 100px; color: white;">
    <?= $ipmsg?>
</section>

<h1 style="color: white; text-align: center; margin-top: 100px;"><?= $visiteurs?> people waiting</h1>

    <script>
setInterval(function() {
  fetch("get_mtntime.php")
    .then(response => response.text())
    .then(data => {
      document.getElementById("mtntime").innerHTML = data;
    });
}, 1000);

</script>

</body>
</html>