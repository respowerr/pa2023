<?php
include_once('php/include.php');
require_once('php/Userinfo.php');
$timestamp = date("Y-m-d H:i:s");
$log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "CTF" . "\n";
file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
if(isset($_POST['message']) && !empty($_POST['message'])) {
  $message = substr(htmlspecialchars($_POST['message']), 0, 200);


  $countmsg = $DB->query('SELECT COUNT(*) FROM chat')->fetchColumn();
  if ($countmsg >= 40) {
    $id_to_delete = $bdd->query('SELECT id_message FROM chat ORDER BY id_message LIMIT 1')->fetchColumn();
    $delmsg = $bdd->prepare('DELETE FROM chat WHERE id_message = ?');
    $delmsg->execute(array($id_to_delete));
}
  if (preg_match('/(https?:\/\/[^\s]+)/', $message) || preg_match('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/', $message)) {
    echo '<div class="email-links"';  
    echo "Les liens et les adresses e-mail ne sont pas autorisés dans le chat.";
    echo '</div>';
  } else {
      if (isset($_SESSION['id'])) {
          $userid = $_SESSION['id'];
          $username = $DB->prepare('SELECT username FROM users WHERE id = ?');
          $username->execute(array($userid));
          $username = $username->fetch()['username'];
          $intermsg = $DB->prepare('INSERT INTO chat(id_user, message, date) VALUES(:id_user, :message, NOW())');
          $intermsg->execute(array(':id_user' => $userid, ':message' => $message));
          
          header("Location: ctf.php");
          exit();
      } else {
          echo '<p style="color=read; text-align=center;"> Vous devez être connecté pour envoyer un message </p>';
      }
  }
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
        <title>Argos - CTF</title>
        <meta content="Argos - About us" property="og:title"/>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
        <link rel="stylesheet" href="css/ctf.css">
        <link rel="stylesheet" href="css/chat.css">
        <link rel="stylesheet" href="css/adminpanel.css">
        <script src="js/chat.js"></script>
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
  <main>
    <h1 class="title is-1" style="color:white; padding: 50px;">Want some challenge ?</h1>
    <h2 class="title is-2" style="color:white ; padding-bottom: 50px;">Choose your destiny and try to resolve all of the challenge bellow</h2>
  <div class="table_challenge">
    <table id="Infos">

    <tr style="border-bottom: 1px solid white; color:white;">
      <th style="font-size: 14px;">Level</th>
      <th style="font-size: 14px;">Name</th>
      <th style="font-size: 14px;">Type</th>
      <th style="font-size: 14px;">Difficulty</th>
    </tr>
  </thead>
    <tr>
      <td>1</td>
      <td><a href="ctf_d1.php" title="Find Joe Doe">Find Joe Doe</a></td>
      </td>
      <td>Retrieve users information</td>
      <td><span class="bar bar-easy"></span>
      <span class="bar bar-medium-dis"></span>
      <span class="bar bar-hard-dis"></span></td>
    </tr>
    <tr>
      <td>2</td>
      <td><a href="ctf_d2.php" title="Where is Joe ?">Where is Joe ?</a></td>
      <td>Image location</td>
      <td><span class="bar bar-easy"></span>
      <span class="bar bar-medium-dis"></span>
      <span class="bar bar-hard-dis"></span></td>
    </tr>
    <tr>
      <td>3</td>
      <td><a href="ctf_d3.php" title="where is that paint ?">Where is that paint ?</a></td>
      <td>Google search is your friend</td>
      <td><span class="bar bar-easy-dis"></span>
      <span class="bar bar-medium"></span>
      <span class="bar bar-hard-dis"></span></td>
    </tr>
    <tr>
      <td >4</td>
      <td><a href="ctf_d4.php" title="Good old time">Good old time</a></td>
      <td>Go into the past</td>
      <td><span class="bar bar-easy-dis"></span>
      <span class="bar bar-medium-dis"></span>
      <span class="bar bar-hard"></span></td>
    </tr>
    <tr>
      <td>5</td>
      <td><a href="ctf_d5.php" title="Star wars vibe">Star wars vibe</a></td>
      <td>Audio analyse</td>
      <td><span class="bar bar-easy-dis"></span>
      <span class="bar bar-medium-dis"></span>
      <span class="bar bar-hard"></span></td>
    </tr>
    <tr>
  </tbody>
</table>
</div>
<div class="chat-container">
    <div class="chat-messages" id="chat-messages">
        <?php 
$allmsg = $DB->query('SELECT chat.*, users.username FROM chat JOIN users ON chat.id_user = users.id ORDER BY chat.id_message ASC');    
while ($msg = $allmsg->fetch()) {
?>
    <b class="pseudo"><?= $msg['username'] ?> : <?= $msg['message'] ?></b> 
<?php }?>

    </div>

    <form id="chat-form" method="POST">
        <div class="form-group">
            <input type="text" name="message" class="input-text" placeholder="Message" maxlength="200" rows="1" cols="33">
            <input type="submit" value="Send" class="btn ">
        </div>
    </form>
</div>

  </main>
<!--Footer-->

      <?php
        require("elements/footer.php");
      ?>

      <style>
        table th{
          color: white;
        }
      </style>
</body>
</html>