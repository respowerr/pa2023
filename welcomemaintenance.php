<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html style="background-color: #282b30;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:description" content="Argos is an OSINT project, allowing to obtain several information linked to an email address. Created by the French company Callidos GROUP.">
        <meta name="description" content="Argos is an OSINT project, allowing to obtain several information linked to an email address. Created by the French company Callidos GROUP.">
        <title>Argos - MAINTENANCE</title>
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
    </head>
    <body>
</html>
<html>
  <main>
    <section style="text-align: center; margin-top: 200px;">
        <div class="shiny-effect"><img src="img/interface/argos4K.svg" width="400px" class="shiny-effect"></div>
        <h1 class="title" style="color: white; font-weight: bold;">MAINTENANCE</h1>
        <div style="color: white; font-weight: bold;" id="text"></div>
        <img src="img/interface/callidos_logo_full-white_svg.svg" style="margin-top: 30px;" width="100px">
    </section>

  </main>
  <style>
    .shiny-effect {
    position: relative;
    overflow: hidden;
    display: inline-block; /* permet d'appliquer l'effet sur une image */
    }

    .shiny-effect:before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0) 100%);
    transform: rotate(45deg);
    animation: shiny-effect 5s linear infinite;
    }

    .shiny-effect img {
    display: block;
    max-width: 100%;
    }

    @keyframes shiny-effect {
    0% {
        transform: translate(-50%, -50%) rotate(45deg);
    }
    100% {
        transform: translate(50%, 50%) rotate(45deg);
    }
    }
  </style>
  <div id="text"></div>

  <script>
    const text = "We are currently working on Argos to add and adjust\nfunctionality.\nArgos will be available soon, sorry for the inconvenience.";
    const delay = 50; // vitesse de frappe (en millisecondes)
    let i = 0;
  
    function typeWriter() {
      if (i < text.length) {
        const char = text.substring(i, i + 1);
        if (char === " ") {
          document.getElementById("text").innerHTML += "&nbsp;";
        } else if (char === "\n") {
          document.getElementById("text").innerHTML += "<br>";
        } else {
          document.getElementById("text").innerHTML += char;
        }
        i++;
        setTimeout(typeWriter, delay);
      }
    }
  
    typeWriter();
  </script>
  
</body>
</html>