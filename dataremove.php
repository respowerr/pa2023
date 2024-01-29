<?php
    require_once('mtn.php');
    if ($site_config['maintenance']) {
        require_once('maintenance.php');
    }
include_once('php/include.php');
require_once('php/Userinfo.php');
$timestamp = date("Y-m-d H:i:s");
$log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "DATA RMV" . "\n";
file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
?>

<!DOCTYPE html>
<html style="background-color: #282b30;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:description" content="Remove your leaked data from Argos databases.">
        <meta name="description" content="Remove your leaked data from Argos databases.">
        <title>Argos - Remove your data</title>
        <meta content="Argos - Remove your data" property="og:title"/>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
    <!--===FONTS===-->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap');
        </style> 
    <!--===FontAwesome===-->
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
        <script src="js/interface.js"></script>
        <meta name="description" content="Argos Search Engine, Nobody is untraceable.">
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
    <h1 style="color: white; text-align: center; margin-top: 100px; font-size: 48px; font-family: 'oxygen'; font-weight: 900; line-height: 1;">Remove <u>yourself</u> from our database.</h1>
<!--Search Bar-->
    <div class="search__container" style="margin: 0 auto; margin-bottom: 40px; margin-top: 45px;">
        <input class="search__input" type="text" placeholder="Put your e-mail :">
    </div>

    <!--===Search Bar responsive===-->
    <style type="text/css">
  @media only screen and (max-width: 600px){
  .search__input{
    width: 100%;
  }
  .search__container{
    width: 77%;
  }
}

  @media only screen and (min-width: 600px){
    .search__input{
      width: 100%;
    }
    .search__container{
      width: 430px;
    }
  }

  .search__container{
    margin-right: auto;
    margin-left: auto;
  }
    </style>

  </main>
<!--===Footer===-->
  <?php 
    require("elements/footer.php");
  ?>
</body>
</html>