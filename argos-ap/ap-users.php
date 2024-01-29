<?php
    require_once('include.php'); // Login SQL
        //Pagination

    $count = $DB->prepare("SELECT count(id) as nbruser FROM users");
    $count->setFetchMode(PDO::FETCH_ASSOC);
    $count->execute();
    $nbruser = $count->fetchAll();

    @$page = $_GET["page"];
    if(empty($page)) $page = 1;
    $nbrligne = 5;
    $nbrpage = ceil($nbruser[0]["nbruser"] / $nbrligne);
    $debut = ($page-1) * $nbrligne;

    $req = $DB->prepare("SELECT * FROM users WHERE grade NOT IN ('6') LIMIT $debut,$nbrligne");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $req_members = $req->fetchAll();

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
                <li style="background-color: #2f30386d;"><a href="ap-users"><i class="fas fa-solid fa-users"></i>Users</a></li>
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
            <div style="text-align: center;">
            <input type="text" id="research" onkeyup="ap_users_research()" placeholder="Search email">
            <div>
            <?php
                    for ($i = 1; $i <= $nbrpage; $i++) {
                            if ($i == 1) {
                                echo "<a style='color: white; font-size: 20px;' href='?page=$i'>$i</a>";
                            } else {
                                if ($page != $i) {
                                    echo "<a style='color: white; font-size: 20px;' href='?page=$i'>$i</a>";
                                } else {
                                    echo "<a style='color: white; font-size: 20px;'>$i</a>";
                                }
                            }
                        }
            ?>
            </div>
            <script>
            function modifrank(id) {
                var choix = document.getElementById("listeChoix_" + id).value;
                var url = "update_rank.php?choix=" + encodeURIComponent(choix) + "&id=" + encodeURIComponent(id);

                switch (choix) {
                    case "choix1":
                        window.location.href = url;
                        break;
                    case "choix2":
                        window.location.href = url;
                        break;
                    case "choix3":
                        window.location.href = url;
                        break;
                    case "choix4":
                        window.location.href = url;
                        break;
                    case "choix5":
                        window.location.href = url;
                        break;
                    case "choix6":
                        window.location.href = url;
                        break;
                    case "choix7":
                        window.location.href = url;
                        break;
                    default:
                        break;
                }
            }
            </script>
            <table id="Infos">
                <tr style="border-bottom: 1px solid white;">
                    <th>Users details</th>
                    <th>Email</th>
                    <th>Sign up date</th>
                    <th>OS</th>
                    <th>Device</th>
                    <th>Rank</th>
                    <th>Other</th>
                </tr>
                <?php
                foreach($req_members as $rm){
                ?>
                <tr>
                    <td style="text-align: left;"><b><?= $rm['username']?></b><img src="../img/interface/CG.png" width="15px" style="margin-left: 15px;"><p id="lastlog">IP address : <?= $rm['userip'] ?></p><p id="lastlog">Browser : <?= $rm['browser'] ?></p><p id="lastlog">ID : <?= $rm['id'] ?></p><p id="lastlog">Last connection : <?= $rm['connection_date'] ?></p></td>
                    <td><?= $rm['email'] ?></td>
                    <td><?= $rm['creation_date'] ?></td>
                    <td><?= $rm['useros'] ?></td>
                    <td><?= $rm['device'] ?></td>
                    <td>
                    <select style="text-align: center; color: white; background-color: #282b30" id="listeChoix_<?php echo $rm['id']; ?>" onchange="modifrank('<?php echo $rm['id']; ?>')">
                        <?php
                        echo '<option value="' . $rm['grade'] . '">' . $rm['grade'] . '</option>';
                        ?>
                        <option value="choix1">No offer</option>
                        <option value="choix2">Discovery</option>
                        <option value="choix3">Popular</option>
                        <option value="choix4">Premium</option>
                        <option value="choix5">Partner</option>
                        <option value="choix6">Director</option>
                        <option value="choix7">President</option>
                    </select>
                    </td>
                    <td>

                    <a style="color: white;" href="#" onclick="if(confirm('Êtes-vous sûr de vouloir bannir cette personne ?')) { window.location.href='ban.php?id=<?php echo $rm['id']; ?>' }">
                        <i class="fa-solid fa-gavel"></i>
                    </a>
                    <a style="color: white;" href="#" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')) { window.location.href='delete.php?id=<?php echo $rm['id']; ?>' }">
                        <i class="fa-solid fa-trash-can" style="margin-left: 15px;"></i>
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