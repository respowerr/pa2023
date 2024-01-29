<?php
include_once('./php/include.php');
foreach (glob(__DIR__ . "/../requirements/*.php") as $filename) {
  include_once $filename;
}

if (isset($_SESSION['id'])){
  $req = $DB->prepare("SELECT * FROM users WHERE id = ?");
  $req->execute([$_SESSION['id']]);
  $req_user = $req->fetch();
  $reqavatar = $DB->prepare("SELECT avatar FROM users WHERE id = ?");
  $reqavatar->execute([$_SESSION['id']]);
  $avatar = $reqavatar->fetch(PDO::FETCH_ASSOC);
}
$rankName = rank::getRankName();
?>
    <!--===Header & Navbar===-->
<link rel="stylesheet" href="../css/bulma-switch.css">
<div class="header" id="Header">
  <nav class="navbar is-transparent, stroke " role="navigation" aria-label="main navigation" style="background: #282b30;">
        <input type="checkbox" id="toggler" role="button" class="toggler" aria-label="menu" aria-expanded="false" data-target="navbarBasic"/>
            <div class="navbar-brand">
              <a class="navbar-item" href="https://argosproject.eu">
                <img src="img/interface/argos4K.svg" width="132" height="28" alt="logo_header">
              </a>
              <div class="navbar-burger burger" id="burger" onclick="toggleBurger()">
              <label for="toggler" class="navbar-burger burger" style="color: white;">
                <span></span>
                <span></span>
                <span></span>
              </a>
            </div>
            </div>
            <div id="navbarBasic" class="navbar-menu">
              <div class="navbar-start" style="font-family: sans-serif;">
              <ul style="margin-top: 8px;">
              <li><a class="navbar-item" href="https://argosproject.eu/dataremove" style="color: white;" id="navlist">
                  Data Remove
                </a></li>
                <li><a class="navbar-item" href="https://argosproject.eu/offers" style="color: white">
                  PRICING
                  </a></li>
                  <li><a class="navbar-item" href="https://argosproject.eu/about" style="color: white">
                  ABOUT US
                  </a></li>
                  <li><a class="navbar-item" href="https://argosproject.eu/ctf" style="color: white">
                  CTF
                  </a></li>
                  <?php
                  if (isset($_SESSION['id'])){
                  ?>
                  <li><a class="navbar-item" href="https://argosproject.eu/profil" style="color: white">
                  MY PROFIL
                  </a></li>
                  <?php
                  }
                  ?>
                  <?php
                  if (isset($_SESSION['id'])){
                    if($req_user['grade'] == 8 || $req_user['grade'] == 9 || $req_user['grade'] == 10) {
                  ?>
                  <li><a class="navbar-item" href="https://argosproject.eu/argos-ap/ap-home" style="color: white">
                  ADMINISTRATION
                  </a></li>
                  <div class="field">
                        <input id="switchRoundedOutlinedDefault" type="checkbox" name="switchRoundedOutlinedDefault" class="switch is-rounded is-outlined" checked="checked" onclick="whiteMode()">
                  </div>
                  <?php
                    }
                  }
                  ?>
                </ul>
              </div>
              <div class="navbar-end">
                <div class="navbar-item">

                  <?php
                    if(!isset($_SESSION['id'])){
                  ?>
 
                    <a class="button is-light" href="register">
                      <strong>Sign up</strong>
                    </a>
                    <a class="button is-info" style="margin-left: 10px;" href="login">
                      Login
                    </a>
                  <?php
                    }else{
                  ?>
      
                  <?php
                  
                  echo "<img width='40px' src='" . $avatar['avatar'] . "' alt='Avatar'>&nbsp;&nbsp;<h1 style='color: white; font-size: 20px;'>$rankName - </h1>&nbsp;";
                  
                  ?>
                    <p style="font-size: 20px; color: white; font-weight: 400;"><?php echo "Welcome, " . htmlspecialchars($_SESSION['username']);?></p>
                    <a class="button is-info" style="margin-left: 10px;" href="logout">
                      Logout
                    </a>
                  <?php
                    }
                  ?>
                  <style>
                    .button.is-info {
                    background-color: darkred;
                    border-color: transparent;
                    color: #fff;
                    }
                    .button.is-info:hover {
                      background-color: #661F10;
                    }
                  </style>

                </div>
              </div>
            </div>
          </nav>
</div>
