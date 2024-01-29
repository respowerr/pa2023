<?php
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }
    
    rank::isAdmin();

    $req = $DB->prepare("SELECT COUNT(id) AS total, COUNT(CASE WHEN grade = 6 THEN 1 END) AS banned FROM users");
    $req->execute();
    $res = $req->fetch();
    $countusr = $res['total'];
    $bannedusr = $res['banned'];

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
                <li style="background-color: #2f30386d;"><a href="ap-home"><i class="fas fa-solid fa-chart-line"></i>Dashboard</a></li>
                <li><a href="ap-users"><i class="fas fa-solid fa-users"></i>Users</a></li>
                <li><a href="ap-maintenance"><i class="fas fa-solid fa-hourglass-start"></i>Maintenance</a></li>
                <li><a href="ap-admin"><i class="fas fa-solid fa-jedi"></i>Newsletter</a></li>
                <li><a href="ap-logs"><i class="fas fa-solid fa-book-journal-whills"></i>Logs</a></li>
                <li><a href="ap-sub"><i class="fas fa-solid fa-award"></i>Subscription</a></li>
                <li><a href="ap-ban"><i class="fas fa-solid fa-ban"></i>Banished</a></li>
                <li><a href="ap-status"><i class="fas fa-solid fa-server"></i>Server</a></li>
                <li class="return"><a href="https://argosproject.eu"><i class="fas fa-solid fa-arrow-left-long"></i>Return to Argos</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <section class="center">
                <div class="ap-box">
                    <p>Visitors : </p>
                </div>
                <div class="ap-box">
                    <p>Members : <?= $countusr ?></p>
                </div>
                <div class="ap-box">
                    <p>Banned : <?= $bannedusr ?></p>
                </div>
            </section>
           
        </div>
    </div>
    <style>
        .ap-box{
            background-color: #363740;
            color: white;
            width: 300px;
            padding: 50px;
            border-radius: 7px;
            margin: 20px;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</body>
</html>