<?php
require_once('php/Userinfo.php');
$timestamp = date("Y-m-d H:i:s");
$log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "PROFIL" . "\n";
file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
    require_once('mtn.php');
    if ($site_config['maintenance']) {
        require_once('maintenance.php');
    }
include_once('php/include.php');
foreach (glob(__DIR__ . "requirements/*.php") as $filename) {
  include $filename;
}

if (!isset($_SESSION['id'])){
  header('location: https://argosproject.eu/');
  exit;
}

$req = $DB->prepare("SELECT * FROM users WHERE id = ?");
$req->execute(array($_SESSION['id']));
$uinfo = $req->fetch();

switch ($uinfo){
  case '1':
    $offer = "No offer";
    break;
  case '2':
    $offer = "Discovery";
    break;
  case '3':
    $offer = "Popular";
    break;
  case '4':
    $offer = "Premium";
    break;
  default:
    $offer = "No offer";
  break;
}
?>
<!DOCTYPE html>
<html style="background-color: #282b30;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:description" content="Argos is an OSINT project, allowing to obtain several information linked to an email address. Created by the French company Callidos GROUP.">
        <meta name="description" content="Argos is an OSINT project, allowing to obtain several information linked to an email address. Created by the French company Callidos GROUP.">
        <title>Argos - My profil</title>
        <meta content="Argos - About us" property="og:title"/>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
    <!--===FONTS===-->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap');
        </style> 
    <!--===FONTAWESOME===-->    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!--===PRINCIPAL_CSS===-->
        <link rel="stylesheet" href="css/main.css">
    <!--===BULMA===-->
        <link rel="stylesheet" href="css/bulma.css">
    <!--===FOOTER===-->
        <link rel="stylesheet" href="css/footer.css">
    <!--===HEADER===-->
        <link rel="stylesheet" href="css/header.css">
    <!--===SEARCH_ENGINE===-->
        <link rel="stylesheet" href="css/searchenginetext.css">
    <!--===PRINCIPAL_JS===-->
        <script src="js/interface.js"></script>
    <!--===Google Analytics===-->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-XD1YDEY3Y3"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-XD1YDEY3Y3');
        </script>
    </head>
    <body>
    <style>
                a.navbar-item:hover {
                  background-color: #282b30;;
                }
                .block{
                  color: white; font-family: 'Oxygen', sans-serif; font-size: 20px;
                }
    </style>
</html>
    <!--===Header===-->
<?php 
  require("elements/header.php");
?>
<html>
  <main>
  <h1 class="title" style="color: white; font-weight: bold; text-align: center; margin-top: 40px;">Welcome on your profil, <?= $_SESSION['username'] ?></h1>
      <section style="text-align: center; color: white; font-size: 16px; font-weight: bold; margin-top: 30px;">
        <p>Account created on : <?= $uinfo['creation_date'] ?></p>
        <p>Current offer : <?= $offer ?></p>
        <p>Email address : <?= $uinfo['email'] ?></p>
        <p>CTF level : <?= $uinfo['level'] ?></p>
        <?php
      $emplacementimg = $uinfo['avatar'];

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["new_avatar"])) {
          $targetDir = "avatar/";
          $imageFileType = strtolower(pathinfo($_FILES["new_avatar"]["name"], PATHINFO_EXTENSION));
      
          $newFileName = basename($emplacementimg); // Obtenir le nom de fichier de l'ancienne image
          $targetFile = $targetDir . $newFileName; // Chemin de destination de la nouvelle image
      
          $check = getimagesize($_FILES["new_avatar"]["tmp_name"]);
          if ($check !== false) {
              if ($_FILES["new_avatar"]["size"] > 500000) {
                  echo "La taille du fichier est trop grande. Veuillez choisir une image plus petite.";
              } else {
                  if (move_uploaded_file($_FILES["new_avatar"]["tmp_name"], $targetFile)) {
                      echo "L'avatar a été mis à jour avec succès !";
                      $emplacementimg = $targetFile;
                  } else {
                      echo "Une erreur s'est produite lors du téléchargement de l'image. Veuillez réessayer.";
                  }
              }
          } else {
              echo "Le fichier sélectionné n'est pas une image valide.";
          }
      }
      ?>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <p>Avatar :</p>
        <img width="70px" src="<?= $emplacementimg ?>" alt="Avatar"><br>
        <input type="file" name="new_avatar" onchange="this.form.submit()">
      </form>



     

      </section>
  </main>
<!--Footer-->
      <?php
        require("elements/footer.php");
      ?>
</body>
</html>