<?php
include_once('php/include.php');
require_once('mtn.php');
require_once('php/Userinfo.php');
$timestamp = date("Y-m-d H:i:s");
$log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "TERMS" . "\n";
file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);

// Si la maintenance est activée, inclure le fichier "maintenance.php" pour bloquer les adresses IP
if ($site_config['maintenance']) {
    require_once('maintenance.php');
}
?>
<!DOCTYPE html>
<html style="background-color: #282b30;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Argos - About us</title>
        <link rel="icon" type="image/png" href="img/interface/icon2.png"/>
        <meta name="description" content="Argos Search Engine, Nobody is untraceable.">
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
    </style>
</html>
    <!--===Header===-->
<?php 
  require("elements/header.php");
?>

<html>
  <main>
<div class="container">
  <section class="hero, fade-in-text">
            <div class="hero-body">
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 35px; text-align: center;">
                <u>GENERAL CONDITIONS</u>
                </p>
                &nbsp;
                    <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                    These terms and conditions govern the use of argosproject.eu site.
                    This site is owned and operated by Callidos Group. By using this site, you indicate that you have read and understand the terms and conditions of use and that you agree to abide by them at all
                    at all times..
                    </div>
                &nbsp;
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Intellectual Property
                </p>

                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                All content published and made available on this site is the property of Callidos Group. This includes, but is not limited to, images, text, logos, documents, downloadable files and anything else that contributes to the composition of this site.
                </div>

                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Accounts
                </p>

                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                When you create an account on our site, you agree that:
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                1. that you are solely responsible for your account and the security and confidentiality of your account, including any passwords or sensitive information attached to it, and
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                2. that all personal information you provide to us through your account is current, accurate and truthful and that you will update your personal information if it changes.
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                We reserve the right to suspend or terminate your account if you use our site illegally or violate the acceptable use policy.
                </div>

                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Sale of Goods and Services
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                This document governs the sale of goods made available on our site.
                The goods we offer include:
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                &nbsp; - A temporary access key to our services.
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                Any information, descriptions or images we provide about our goods are described and presented as accurately as possible. However, we are not legally bound by such information, descriptions or images because we cannot guarantee the accuracy of every product or service we provide. You agree to purchase these products at your own risk.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Payments
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                We accept the following payment methods on this site:
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                &nbsp;&nbsp;- Credit Card
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                &nbsp;&nbsp;- PayPal
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                &nbsp;&nbsp;- Crypto-currency
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                When you provide us with your payment details, you confirm that you have authorized the use of and access to the payment instrument you have chosen to use. By providing us with your payment details, you confirm that you authorize us to debit the amount due on that payment instrument.
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                If we believe that your payment has violated any law or any of our terms of use, we reserve the right to cancel your transaction.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Limitation of Liability
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                The Callidos Group or any of its employees cannot be held responsible for any problems arising from this site. However, Callidos Group and its employees will not be liable for any problems arising from improper use of this site.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Indemnification
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                You, the user, hereby indemnify Callidos Group from and against any and all liabilities, costs, causes of action, damages or expenses arising out of your use of this site or your breach of any of the provisions set forth herein.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Governing Law
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                This document is subject to the applicable <u>laws of France</u> and is intended to comply with its necessary rules and regulations. This includes the European Union-wide regulations set forth in the GDPR.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Severability
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                If at any time any of the provisions set forth in this document are found to be inconsistent with or invalid under applicable law, such provisions shall be deemed void and deleted from this document. All other provisions shall not be affected by such laws and the remainder of this document shall continue to be considered valid.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Changes
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                These terms and conditions may be amended from time to time to comply with the law and to reflect any changes in the way we operate our site and the way we expect users to conduct themselves on our site. We recommend that our users check these terms from time to time to ensure that they are aware of any updates. If necessary, we will notify users by email of changes to these terms and conditions or post a notice on our site.
                </div>
                <p class="title, fade-in-textfast" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 22px;">
                - Contact
                </p>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                Please contact us if you have any questions or concerns. Our contact information is as follows:
                </div>
                <div class="block" style="color: white; font-family: 'Oxygen', sans-serif; font-size: 15px;">
                contact@callidosgroup.eu
                </div>
             </div>
        </section>
                </div>
                </main>
    <!--FOOTER-->
    <?php
      require("elements/footer.php");
    ?>
</body>
</html>