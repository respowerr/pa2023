
<?php
    opcache_reset();
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
    require_once('vendor/autoload.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    rank::exist();

    if(!empty($_POST)){
        extract($_POST);
        $register = (boolean) true;

        if(isset($_POST['register'])){
            $username = htmlspecialchars(ucfirst(trim($username)));
            $email = htmlspecialchars(trim($email));
            $confemail = htmlspecialchars(trim($confemail));
            $password = htmlspecialchars(trim($password));
            $confpassword = htmlspecialchars(trim($confpassword));

            if (empty($username)){ // Vérification pseudo
                $register = false;
                $err_username = "This field cannot be empty.";
            } elseif(strlen($username) < 3) { // minium 3 char 
                $register = false;
                $err_username = "The username must be at least 3 characters long.";
            } elseif(strlen($username) > 15) { // maximum 15 char
                $register = false;
                $err_username = "The username must have a maximum of 15 characters.";
            }

            if (empty($email)){ // Vérification addresse email
                $register = false;
                $err_email = "This field cannot be empty."; // si vide ?

            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { // email valide ?
                $register = false;
                $err_email = "Invalid e-mail format.";

            } elseif ($email <> $confemail) { // Email et Confemail identique ?
                $register = false;
                $err_email = "The email doesn't match.";
            } else {
                $req = $DB->prepare("SELECT id FROM users WHERE email = ?");
                $req->execute(array($email));
                $req = $req->fetch();

                if(isset($req['id'])){
                    $register = false;
                    $err_email = "This email is already used.";
                }
            }

            if(empty($password)){ // Vérification mot de passe
                $register = false;
                $err_password = "This field cannot be empty.";
            } elseif($password <> $confpassword) {
                $register = false;
                $err_password = "The password doesn't match.";
            } elseif(strlen($password) < 7){
                $register = false;
                $err_password = "7 characters minimum.";
            } elseif(strlen($password) > 40){
                $register = false;
                $err_password = "40 characters maximum.";
            }

            if($register) {
             

                $crypt_password = password_hash($password, PASSWORD_ARGON2ID);

                $creation_date = date('Y-m-d H:i:s'); 
                $useros = Userinfo::get_OS(); 
                $userip = Userinfo::get_ip(); 
                $userbrowser = Userinfo::get_browser(); 
                $userdevice = Userinfo::get_device(); 

                //Creation code de validation
                $longueurKey = 16;
                $key = "";
                for($i=1;$i<$longueurKey;$i++){
                    $key .= mt_rand(0,9);
                }

                // Avatar
                $letters = substr($username, 0, 2);
                $image = imagecreatetruecolor(100, 100);
                $background_color = imagecolorallocate($image, 0, 0, 0); // Noir
                $text_color = imagecolorallocate($image, 255, 255, 255); // Blanc
                $font_file = 'font/arial.ttf';
                $font_size = 40;
                $text_box = imagettfbbox($font_size, 0, $font_file, $letters);
                $text_width = $text_box[2] - $text_box[0];
                $text_height = $text_box[3] - $text_box[5];
                $text_x = (100 - $text_width) / 2;
                $text_y = (100 + $text_height) / 2;
                imagettftext($image, $font_size, 0, $text_x, $text_y, $text_color, $font_file, $letters);
                $file_name = date('Y-m-d_H-i-s') . '.png';
                $avatar_folder = 'avatar/';
                $image_path = $avatar_folder . $file_name;
                imagepng($image, $image_path);

                $timestamp = date("Y-m-d H:i:s");
                $log_message = $timestamp . " - " . $email . " register from " . $userip . "with" . $userdevice . "\n";
                file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);

                $req34 = $DB->prepare("INSERT INTO users (username, email, password, creation_date, connection_date, useros, userip, browser, device, confirmkey, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $req34->execute(array($username, $email, $crypt_password, $creation_date, $creation_date, $useros, $userip, $userbrowser, $userdevice, $key, $image_path));


                //ENVOI EMAIL INSCRIPTION
                $mail = new PHPMailer(true);
                $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.hostinger.com';                
                    $mail->SMTPAuth   = true;                                  
                    $mail->Username   = 'callidos@callidosgroup.eu';                    
                    $mail->Password   = 'ArG0SCaLL1DoS@';                        
                    $mail->SMTPSecure = 'ssl';     
                    $mail->Port       = 465;                      
                
                    $mail->setFrom('callidos@callidosgroup.eu', 'Argos Project');
                    $mail->addAddress($email, $username);             
                    $mail->Subject = 'Confirm your Argos account';
                    $mail->isHTML(true);
                    $message ='
                    <html>
                    <head>
                        <meta charset="UTF-8">
                        <title>Email confirmation</title>
                        <style>
                            body {
                                margin: 0;
                                padding: 0;
                                background-color: #26272b;
                                font-family: Arial, sans-serif;
                            }

                            .container {
                                width: 100%;
                                max-width: 700px;
                                margin: 0 auto;
                                border-radius: 10px;
                                padding: 40px;
                                text-align: center;
                                background-color: #26272b;
                            }

                            h1 {
                                color: white;
                                margin-bottom: 20px;
                            }

                            p {
                                font-size: 18px;
                                margin-top: 40px;
                                margin-bottom: 40px;
                                color: #ffffff;
                            }

                            a {
                                display: inline-block;
                                background-color: #ffffff;
                                color: #26272b;
                                font-size: 18px;
                                font-weight: bold;
                                text-align: center;
                                text-decoration: none;
                                padding: 15px 50px;
                                border-radius: 30px;
                            }

                            a:hover {
                                background-color: #e6e6e6;
                            }

                            .footer {
                                text-align: center;
                                padding: 10px 0;
                                color: #ffffff;
                                font-size: 12px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <img src="https://i.ibb.co/hg8M3g8/principal-white.png" width="350" alt="Logo">
                            <h1><strong style="color: red;">Email</strong> confirmation</h1>
                            <p>Please confirm your email address to validate the creation of your account.</p>
                            <a href="https://argosproject.eu/acct-conf.php?email='.urlencode($email).'&key='.$key.'">CONFIRM EMAIL</a>
                            <div class="footer">© Callidos GROUP</div>
                        </div>
                    </body>
                    </html>
                ';                
                
                    $mail->MsgHTML($message);
                    $mail->send();
                    header('location: login.php');
                
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html style="background-color: #282b30; padding: 0;" lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="Argos Search Engine, Nobody is untraceable."/>
        <title>Argos - Register</title>
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
    <!--===HEADER===-->
        <link rel="stylesheet" href="css/header.css">
    <!--LOGIN-->
        <link rel="stylesheet" href="css/login.css">
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
    <body style="padding: 0;">
      <style type="text/css">
          a.navbar-item:hover {
            background-color: #282b30;;
          }
      </style>

<body>
    <?php
        include('elements/header.php');
    ?>
    <main>

    <div class="center" style="z-index: 1; padding: 0.2em; margin-top: 55px;">
      <div style="text-align: center; margin-top: 20px;"><img src="img/interface/argos.png" style="width: 200px;"/></div>
      <form method="post">
      <?php if(isset($err_username)){ echo '<h2 style="text-align: center;">' . $err_username . '</h2>'; } ?>
      <div class="txt_field">
          <input type="text" name="username" value="<?php if(isset($username)){ echo $username;} ?>" required>
          <span></span>
          <label>Username</label>
        </div>
      <?php if(isset($err_email)){ echo '<h2 style="text-align: center;">' . $err_email . '</h2>'; } ?>
        <div class="txt_field">
          <input type="text" name="email" value="<?php if(isset($email)){ echo $email;} ?>" required>
          <span></span>
          <label>E-mail</label>
        </div>
        <div class="txt_field">
          <input type="text" name="confemail" value="<?php if(isset($confemail)){ echo $confemail;} ?>" required>
          <span></span>
          <label>Confirm e-mail</label>
        </div>
        <?php if(isset($err_password)){ echo '<h2 style="text-align: center;">' . $err_password . '</h2>'; } ?>
        <div class="txt_field">
          <input type="password" name="password" value="<?php if(isset($password)){ echo $password;} ?>" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="confpassword" value="<?php if(isset($confpassword)){ echo $confpassword;} ?>" required>
          <span></span>
          <label>Confirm password</label>
        </div>
        <input type="submit" name="register" value="Register">
        <div class="signup_link">
        Already a member? <a href="https://argosproject.fr/login">Login</a>
        </div>
      </form>
    </div>

    </main>

    <?php 
      require("elements/footer.php");
    ?>
</body>
</html>
