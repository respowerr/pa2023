<?php
include_once('php/include.php');
require_once('php/Userinfo.php');
$timestamp = date("Y-m-d H:i:s");
$log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "CTF-D1" . "\n";
file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
if (isset($_SESSION['id'])){
$id_player = $_SESSION['id'];
$levelPage = 0;
$req = $DB->prepare("SELECT level FROM users WHERE id = ?");
$req->execute(array($id_player));
$level = $req->fetch()['level'];

if (isset($_POST["response"])) {
  $response = htmlspecialchars($_POST["response"]);
  if($response == "jack_daniel_colisee"){
    if($level>($levelPage)){
    $rep = "Congratulations! You have solved the challenge again ! What are you looking for ? A medal ?";
    }
    elseif($level == $levelPage){
      $rep = "Congratulations! You have solved the challenge. You move up a level!";
      $res = $DB->prepare('UPDATE users SET level = level + 1 WHERE id = ?');
      $res->execute(array($id_player));
      }
      }
    }
  }
  else{
    $rep = "You must be login to continue";
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
        <title>Argos - About us</title>
        <meta content="Argos - About us" property="og:title"/>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
        <link rel="stylesheet" href="css/ctf.css">
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
    <!--===SEARCH_ENGINE===-->
        <script src="js/stickyheader.js"></script>
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
    </style>
</html>
    <!--===Header===-->
<?php 
  require("elements/header.php");
?>

<html>
<main class="aller">
<div class="ctf_main">
<div class="ctf_box">
<h1 class="title is-1" style="color:white; padding: 20px;">CTF Challenge</h1>
<div class="dif">
<h2 class="title is-3" style="color:white; padding: 20px;">Difficulty : </h2>
<span class="bar bar-easy"></span>
<span class="bar bar-medium-dis"></span>
<span class="bar bar-hard-dis"></span>
</div>

<form class="ctf_" method="post">
    <p class="title is-5" style="color:white">As a private detective, you are faced with a delicate case. Your desperate client, eager to uncover the truth, provides you with a unique and intriguing piece of evidence: an email address. Your mission, as complex as it is thrilling, is to delve into the digital world to unearth crucial information about the mysterious individual behind this address. You embark on a meticulous investigation, knowing that every clue is valuable. You start by examining the email address itself, analyzing the names, combinations of letters or numbers that could reveal insights about its owner's identity. Will you accept the challenge of diving into the digital realm to unravel the secrets hidden behind this email address?</p>
    <p class="title is-5" style="color:white">Email : mizoredelavegamafia@gmail.com</p>
    <p class="title is-5" style="color:white">Your mission : Find his name and the name of the monument in his profile picture.</p>
    <p class="title is-5" style="color:white">Answer must be in lowercase and without accents. Exemple : anne_marie_bigben</p>
    <?php if (isset($rep)) : ?>
    <p style="color: red;"><?= $rep ?></p>
    <?php endif; ?>
    <div class="field has-addons" style="justify-content: center;">
      <div class="button_send">
  <div class="control">
    <input class="input" type="text" placeholder="Place the flag here" name="response">
  </div>
  <div class="control">
    <input type="submit" class="button is-info" style="background-color: green;" value="Verify">
  </div>
  </div>
</div>
</form>
</div>
</div>

  </main>
<!--Footer-->
      <?php
        require("elements/footer.php");
      ?>
</body>
</html>