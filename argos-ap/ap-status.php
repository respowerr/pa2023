<?php
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }
    
    rank::isAdmin();
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
                <li><a href="ap-maintenance"><i class="fas fa-solid fa-hourglass-start"></i>Maintenance</a></li>
                <li><a href="ap-admin"><i class="fas fa-solid fa-jedi"></i>Newsletter</a></li>
                <li><a href="ap-logs"><i class="fas fa-solid fa-book-journal-whills"></i>Logs</a></li>
                <li><a href="ap-sub"><i class="fas fa-solid fa-award"></i>Subscription</a></li>
                <li><a href="ap-ban"><i class="fas fa-solid fa-ban"></i>Banished</a></li>
                <li style="background-color: #2f30386d;"><a href="ap-status"><i class="fas fa-solid fa-server"></i>Server</a></li>
                <li class="return"><a href="https://argosproject.eu"><i class="fas fa-solid fa-arrow-left-long"></i>Return to Argos</a></li>
            </ul> 
        </div>
        <div class="main_content">

            <?php 
                $load_avg = sys_getloadavg();
                echo "<p style='color : white;'>La charge moyenne du système est : " . $load_avg[0];   

                $memory_usage = memory_get_usage();
                echo "<p style='color : white;'>Utilisation de la RAM : ".$memory_usage." octets";

                $speed = shell_exec("cat /proc/cpuinfo | grep 'model name' | uniq | awk -F':' '{print $2}'");
                echo "<p style='color : white;'> Vitesse du processeur : ".$speed; 

                
                $cpu_info = shell_exec('cat /proc/cpuinfo');
                echo "<h3 style='color:white'>Informations sur le processeur :</h3>" . "<pre style='color:white'>" . $cpu_info . "</pre>";

                // Informations sur la mémoire
                $mem_info = shell_exec('cat /proc/meminfo');
                echo "<h3 style='color:white'>Informations sur la mémoire :</h3>" . "<pre style='color:white'>" . $mem_info . "</pre>";

                // Informations sur les disques durs
                $disk_info = shell_exec('df -h');
                echo "<h3 style='color:white'>Informations sur les disques durs :</h3>" . "<pre style='color:white'>" . $disk_info . "</pre>";

                // Informations sur le système
                $sys_info = shell_exec('uname -a');
                echo "<h3 style='color:white'>Informations sur le système :</h3>" . "<pre style='color:white'>" . $sys_info . "</pre>";


            ?>  
           
        </div>
    </div>
</body>
</html>