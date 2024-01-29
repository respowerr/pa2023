<?php
   require_once("php/include.php");
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <?php
        require_once("elements/head.html");
      ?>
        <title>Account confirmation</title>
        <meta content="Argos - OSINT Search Engine" property="og:title"/>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
        <!--===SEARCH_ENGINE_ANIMATION===-->
        <link rel="stylesheet" href="css/searchenginetext.css">
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
  require_once("elements/header.php");
?>
<html>
  <main>
  <?php 
      if(isset($_GET['email'], $_GET['key']) AND !empty($_GET['email']) AND !empty($_GET['key'])) {
         $email = htmlspecialchars(urldecode($_GET['email']));
         $key = htmlspecialchars($_GET['key']);
         $requser = $DB->prepare("SELECT * FROM users WHERE email = ? AND confirmkey = ?");
         $requser->execute(array($email, $key));
         $userexist = $requser->rowCount();
         if($userexist == 1) {
            $user = $requser->fetch();
            if($user['valid'] == 0) {
               $updateuser = $DB->prepare("UPDATE users SET valid = 1 WHERE email = ? AND confirmkey = ?");
               $updateuser->execute(array($email,$key));
               echo "<h1 class='title' style='color: white; text-align: center;'>Your account has been confirmed !</h1>";

            } else {
               echo "<h1 class='title' style='color: white; text-align: center;'>Your account has already been confirmed !</h1>";
            }
         } else {
            echo "<h1 class='title' style='color: white; text-align: center;'>The user does not exist !</h1>";
         }
      }

   ?>
  </main>
<!--Footer-->
      <?php
        require("elements/footer.php");
      ?>
</body>
</html>