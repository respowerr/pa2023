<?php
    require_once('mtn.php');
    if ($site_config['maintenance']) {
        require_once('maintenance.php');
    }
    include_once('php/include.php');
    require_once('php/Userinfo.php');
    $timestamp = date("Y-m-d H:i:s");
    $log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "ABOUT" . "\n";
    file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
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
    <!--Title-->
        <section class="hero, fade-in-text">
          <div class="container">
            <div class="hero-body">
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 40px;">
                Argos, what is it ?
                </p>
                    <div class="block" style="margin-top: 20px">
                    The Argos project is a cybersecurity project created by Callidos GROUP in the field of OSINT, designed to help find as much information as possible about a person using only their email address.
                    Argos is still in beta stage, which means that not all features are available yet, but it is already a powerful tool for those looking for information about people or organisations.
                    </div>
                    <div class="block">
                    The main purpose of Argos is to provide information about people for cybersecurity, data protection and fraud prevention purposes. Using advanced online information gathering techniques, 
                    it can provide relevant and accurate data on individuals associated with a given email address.
                    </div>
                    <div class="block">
                    Features currently available in Argos include searching the email address history, collecting information from social networks, searching professional profiles, collecting information 
                    from online accounts, searching public information from online forums and blogs, and searching for passwords associated with the email address.
                    </div>
                    <div class="block">
                    Overall, Argos is a promising project in the field of cybersecurity and OSINT that can help security professionals, investigators, and businesses gain valuable information 
                    about the people associated with a given email address.
                    </div>
             </div>
            </div>
        </section>
  </main>
<!--Footer-->
      <?php
        require("elements/footer.php");
      ?>
</body>
</html>