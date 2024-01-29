<!--                                                                                     @@@@@@@@@@@
          @@@             @@@@@@@@@@@@@@@@     @@@@@@@@@@@@         &@@     @       @@@@@   @@@@@@@@
          @@@@@           @@@@.       @@@@@     @@@@   @@@@@@    @.  (@@@@@@@@@#  #@@@@.            
       @@  @@@@@          @@@@@@@@@@@@@@@@@  @@          @@@@@       @@@@@@%@@@@&  @@@@@@@@@@@@@@   
      @@@@  @@@@@@            @@@@@@@@@@@@   @@@@@                    @ @@@@     @   @@@@@@@@@@@@@@@@
    @@@@@     @@@@@       @@@  @@@@@@@       @@@@@     /@@@@@@  @       @@      @               @@@@
   @@@@@       @@@@@@     @@@@    @@@@@@(     @@@@@@@@@@@@@@@@   @             @  @@@@@@@@@@@@@@@@@@
 @@@@@           @@@@@    @@@@      @@@@@@@      @@@@@@@@%@@@@      &       ,     @@@@@@@@@@@@@@@@    V-1.0
-->
<?php
    require_once('mtn.php');
    if (isset($site_config['maintenance'])) {
        require_once('maintenance.php');
    }
    require_once('db/pg.php');
    include_once('php/include.php');
    require_once('php/Userinfo.php');
    $timestamp = date("Y-m-d H:i:s");
    $log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "INDEX" . "\n";
    file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);

?>

<!DOCTYPE html>
<html style="background-color: #282b30; padding: 0;" lang="en">
    <head>
      <?php
        require("elements/head.html");
      ?>
        <meta property="og:description" content="Search with Argos, an OSINT search engine for your leaked passwords and more only with your email.">
        <meta name="description" content="Search with Argos, an OSINT search engine for your leaked passwords and more only with your email.">
        <title>Argos - OSINT Search Engine</title>
        <meta content="Argos - OSINT Search Engine" property="og:title"/>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
        <!--===SEARCH_ENGINE_ANIMATION===-->
        <link rel="stylesheet" href="css/searchenginetext.css">
    </head>

    <body style="padding: 0;">
      <style type="text/css">
          a.navbar-item:hover {
            background-color: #282b30;;
          }
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
            @media only screen and (max-width: 600px){
              #imgprincipal{
                width: 300px;
              }
            }
      </style>

    <!--===Header===-->
<?php 
  require("elements/header.php");
?>
  <main style="padding: 0;">
        <img class="imgcenter" src="img/interface/argos4K.svg" width="400" style="margin-top: 3%;" alt="central-logo" id="imgprincipal">
        <p class="SEE" style="text-align: center; margin-top: 20px; font-size: 20px">SEARCH ENGINE</p>

    <!--===Search Bar===-->
  <!--===Search Bar===-->
    <form method="post" style="margin-top: 70px;">
      <div class="search__container" style="margin-bottom: 40px;">
        <input class="search__input" type="search" name="q" placeholder="Search e-mail..." id="searchm"/>
      </div>
    </form>

      <p style="color: white; text-align: center; margin-top: 20px; font-size: 20px; font-family: 'Oxygen', sans-serif;" id="testnight">Search through <a style="color: red;">2 000 000 000 </a>accounts</p>

      <?php
      if (isset($_SESSION['grade']) >= 2 && isset($_SESSION['grade']) <= 10){
        if (isset($_POST['q'])){
          $recherche = htmlspecialchars($_POST['q']);
          $start_time = microtime(true);
          $heri = $PG->prepare("SELECT email, password, 'vue_materiel' as table_name FROM leak.vue_materiel WHERE to_tsvector('simple', email) @@ to_tsquery(:recherche);");
          $heri->bindParam(':recherche', $recherche);
          $heri->execute();
          $end_time = microtime(true);
          $execution_time = $end_time - $start_time;
          $results = $heri->fetchAll();
          $tables = $heri->fetchAll(PDO::FETCH_COLUMN);

          if (empty($results)) {
            echo "<h1 style='color: white; font-size: 18px; text-align: center;'>No results.<h1>";
          } else {
            foreach ($results as $result) {
             echo "<h1 style='color: white; font-size: 18px; text-align: center; margin-top: 30px;'>Password :" . " " . $result['password'] . "</h1>";
             echo "<h1 style='color: white; font-size: 15px; text-align: center;'>Table: " . implode(', ', $tables) . "</h1>";
            }
            echo "<h1 style='color: white; font-size: 15px; text-align: center; margin-top: 30px;'>Execution time: " . $execution_time . " seconds</h1>";
          }
        }
      } else {
        if (isset($_POST['q'])){
          $recherche = htmlspecialchars($_POST['q']);
          $start_time = microtime(true);
          $heri = $PG->prepare("SELECT email, password, 'vue_materiel' as table_name FROM leak.vue_materiel WHERE to_tsvector('simple', email) @@ to_tsquery(:recherche);");
          $heri->bindParam(':recherche', $recherche);
          $heri->execute();
          $end_time = microtime(true);
          $execution_time = $end_time - $start_time;
          $results = $heri->fetchAll();
          $tables = $heri->fetchAll(PDO::FETCH_COLUMN);

          if (empty($results)) {
            echo "<h1 style='color: white; font-size: 18px; text-align: center;'>No results.<h1>";
          } else {
            $passwordFound = false;
            foreach ($results as $result) {
              if ($result['password']) {
                $passwordFound = true;
                break;
              }
            }
            if ($passwordFound) {
              echo "<h1 style='color: white; font-size: 18px; text-align: center; margin-top: 40px'>Compromised account, become a member to get access.</h1>";
            } else {
              echo "<h1 style='color: white; font-size: 18px; text-align: center; margin-top: 40px'>No match</h1>";
            }
          }          
        }
      }

      ?>
      </main>

    <?php 
      require("elements/footer.php");
    ?>
    
          

      <!--PRINCIPAL_JS-->
      <script src="js/interface.js" async></script>
      <!--===Google Analytics===-->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-XD1YDEY3Y3"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-XD1YDEY3Y3');
      </script>
    </body>
</html>
