<?php
    require_once('include.php'); // Login SQL
    foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
        include $filename;
    }
    
    rank::isAdmin();
    
    $req = $DB->prepare("SELECT * FROM users WHERE grade = 6");
    $req->execute();
    $req_members = $req->fetchAll();

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
                <li style="background-color: #2f30386d;"><a href="ap-ban"><i class="fas fa-solid fa-ban"></i>Banished</a></li>
                <li><a href="ap-status"><i class="fas fa-solid fa-server"></i>Server</a></li>
                <li class="return"><a href="https://argosproject.eu"><i class="fas fa-solid fa-arrow-left-long"></i>Return to Argos</a></li>
            </ul> 
        </div>
        <div class="main_content">
        <div style="text-align: center;">
            <input type="text" id="research" onkeyup="ap_users_research()" placeholder="Search email">
            <table id="Infos">
                <tr style="border-bottom: 1px solid white;">
                    <th>Users details</th>
                    <th>Email</th>
                    <th>Ban date</th>
                    <th>Sign up date</th>
                    <th>OS</th>
                    <th>Device</th>
                    <th>Unban</th>
                </tr>
                <?php
                foreach($req_members as $rm){
                ?>
                <tr>
                    <td style="text-align: left;"><b><?= $rm['username']?></b><img src="../img/interface/CG.png" width="15px" style="margin-left: 15px;"><p id="lastlog">IP address : <?= $rm['userip'] ?></p><p id="lastlog">Browser : <?= $rm['browser'] ?></p><p id="lastlog">ID : <?= $rm['id'] ?></p><p id="lastlog">Last connection : <?= $rm['connection_date'] ?></p></td>
                    <td><?= $rm['email'] ?></td>
                    <td><?= $rm['ban_date'] ?></td>
                    <td><?= $rm['creation_date'] ?></td>
                    <td><?= $rm['useros'] ?></td>
                    <td><?= $rm['device'] ?></td>
                    <td>
                    <a style="color: white;" href="#" onclick="if(confirm('Êtes-vous sûr de vouloir débannir ce compte ?')) { location.href='unban.php?id=<?php echo $rm['id']; ?>' }">
                       <i class="fa-solid fa-scale-unbalanced-flip"></i>
                    </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
            </div>
        </div>
    </div>
    <script src="../js/ap_users_research.js"></script>
</body>
</html>