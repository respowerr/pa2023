<?php
    require_once('mtn.php');
    if ($site_config['maintenance']) {
        require_once('maintenance.php');
    }
    date_default_timezone_set('Europe/Paris');
    require_once('php/include.php'); // Login SQL
    require_once('php/Userinfo.php'); // Classe info users
    foreach (glob(__DIR__ . "/requirements/*.php") as $filename) {
        include_once $filename;
    }


    rank::exist();

    
    if(!empty($_POST)){
        extract($_POST);
        $login = (boolean) true;

        if(isset($_POST['login'])){
            $email = htmlspecialchars(trim($email));
            $password = htmlspecialchars(trim($password));

            if (empty($email)){ // Vérification addresse email
                $login = false;
                $err_email = "This field cannot be empty."; // si vide ?
            } 
            if(empty($password)){ // Vérification mot de passe
                $login = false;
                $err_password = "This field cannot be empty.";
            }
            
            if($login) {

                $req33 = $DB->prepare("SELECT password, grade, valid FROM users WHERE email = ?");
                $req33->execute(array($email));
                $req34 = $req33->fetch();

                if(isset($req34['password'])){
                    if(!password_verify($password, $req['password'])){
                        $login = false;
                        $err_email = "Invalid password or email.";
                    }
                }else{
                    $login = false;
                    $err_email = "Invalid password or email.";
                }

                if($req['grade'] == 6){
                    $login = false;
                    $err_email = "Banned account !";
                }
                if($req['valid'] == 0){
                    $login = false;
                    $err_email = "Please verify your account !";
                }

                $req = $DB->prepare("SELECT * FROM users WHERE email = ?");
                $req->execute(array($email));
                $req_user = $req->fetch();

                if(isset($req_user['id'])){
                    $connection_date = date('Y-m-d H:i:s'); // Date de connection
                    $useros = Userinfo::get_OS(); // Récupération de l'OS
                    $userip = Userinfo::get_ip(); // Récupération de l'ip
                    $userbrowser = Userinfo::get_browser(); // Récupération du navigateur
                    $userdevice = Userinfo::get_device(); // Récupération de l'appareil

                    $timestamp = date("Y-m-d H:i:s");
                    $log_message = $timestamp . " - " . $email . " connected from " . $userip . "with" . $userdevice . "\n";
                    file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
    
                    $req = $DB->prepare("UPDATE users SET connection_date = ? WHERE id = ?"); // Envoie des données
                    $req->execute(array($connection_date, $req_user['id']));

                    $_SESSION['id'] = $req_user['id'];
                    $_SESSION['username'] = $req_user['username'];
                    $_SESSION['email'] = $req_user['email'];
                    $_SESSION['grade'] = $req_user['grade'];
    
                    header('location: https://argosproject.eu');
                    exit;

                }else{
                    $login = false;
                    $err_email = "Invalid password or email.";
                }
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en" style="background-color: #282b30">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Argos Search Engine, Nobody is untraceable.">
        <title>Argos - Login</title>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--===FONTS===-->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap');
        </style> 
    <!--===PRINCIPAL_CSS===-->
        <link rel="stylesheet" href="css/main.css">
    <!--===BULMA===-->
        <link rel="stylesheet" href="css/bulma.css">
    <!--===FOOTER===-->
        <link rel="stylesheet" href="css/footer.css">
    <!--LOGIN-->
        <link rel="stylesheet" href="css/login.css">
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
	<!--Header-->
	<?php 
		require("elements/header.php");
	?>
    <main>

    <div class="center" style="z-index: 1; padding: 0.2em; margin-top: 55px;">
      <div style="text-align: center; margin-top: 20px;"><img src="img/interface/argos.png" style="width: 200px;"/></div>
      <form method="post">
      <?php if(isset($err_email)){ echo '<h2 style="text-align: center;">' . $err_email . '</h2>'; } ?>
        <div class="txt_field">
          <input type="text" name="email" value="<?php if(isset($email)){ echo $email;} ?>" required>
          <span></span>
          <label>E-mail</label>
        </div>
        <?php if(isset($err_password)){ echo '<h2 style="text-align: center;">' . $err_password . '</h2>'; } ?>
        <div class="txt_field">
          <input type="password" name="password" value="<?php if(isset($password)){ echo $password;} ?>" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="login" value="Login">
        <div class="signup_link">
          Not a member? <a href="https://argosproject.eu/register">Signup</a>
        </div>
      </form>
    </div>
</main>
<?php 
      require("elements/footer.php");
?>
</body>
</html>