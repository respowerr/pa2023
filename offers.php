<?php
    require_once('mtn.php');
    if ($site_config['maintenance']) {
        require_once('maintenance.php');
    }
    include_once('php/include.php');
    require_once('php/Userinfo.php');
    $timestamp = date("Y-m-d H:i:s");
    $log_message = $timestamp . " - " . $_SESSION['username'] . " on page " . "OFFERS" . "\n";
    file_put_contents("logs/logs.txt", $log_message, FILE_APPEND);
?>
<!DOCTYPE html>
<html style="background-color: #282b30;">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:description" content="Argos is free for basic use. Choose from 3 offers to have access to passwords .">
        <meta name="description" content="Argos is free for basic use. Choose from 3 offers to have access to passwords .">
        <title>Argos - Pricing</title>
        <meta content="Argos - Pricing" property="og:title"/>
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
  <style type="text/css">
      @media only screen and (max-width: 600px){
        .box{
          padding: 0;
        }
        .column{
          padding-left: 0;
        }
      }
    </style>
   <div class="pricing">
  <div class="container">
    <div class="pricing__title">Unbeatable prices,<p>
for optimal service quality.</p></div>
    <div class="pricing__grid">
      <div class="pricing__card pricing-card pricing-card_free">
        <div class="pricing-card__top">
          <div class="pricing-card__title">Discovery</div>
          <div class="pricing-card__price">9.99€</div>
        </div>
        <div class="pricing-card__body">
          <div class="pricing-card__pluses">
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>Normal database access</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>uncensored password</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>30 search limits / day</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✖</i></div>
              <div class="pricing-card__plus-text">Research history</div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✖</i></div>
              <div class="pricing-card__plus-text">Alert system</div>
            </div>
          </div>
          <?php
          if (isset($_SESSION["id"]) && $_SESSION["grade"] !== 2 && $_SESSION["grade"] !== 3 && $_SESSION["grade"] !== 4 && $_SESSION["grade"] !== 5 && $_SESSION["grade"] !== 6 && $_SESSION["grade"] !== 7 && $_SESSION["grade"] !== 8 && $_SESSION["grade"] !== 9 && $_SESSION["grade"] !== 10){ ?>
          <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1N5tbUE2uBhK8kS753CgXxTO"
  publishable-key="pk_test_51N4siGE2uBhK8kS7La9uVUryR8lFVZTVECfQiJEKZF7W8bzj9RHrdC9uF4eYpCPslxyZpar9pRjvCYOinEHifsrh00Ff4CQ7ms"
>
</stripe-buy-button>
            <?php }else{ 
              header("Location:argosproject.fr/login");
            }?>
        </div>
      </div>
      <div class="pricing__card pricing-card">
        <div class="pricing-card__top">
          <div class="pricing-card__title">Popular</div>
          <div class="pricing-card__price">14.99€</div>
        </div>
        <div class="pricing-card__body">
          <div class="pricing-card__pluses">
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>Normal database access</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>uncensored password</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>60 search limits / day</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text">Research history</div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text">Alert system</div>
            </div>
          </div>
          <?php
          if (isset($_SESSION["id"]) && $_SESSION["grade"] !== 3 && $_SESSION["grade"] !== 4 && $_SESSION["grade"] !== 5 && $_SESSION["grade"] !== 6 && $_SESSION["grade"] !== 7 && $_SESSION["grade"] !== 8 && $_SESSION["grade"] !== 9 && $_SESSION["grade"] !== 10){ ?>
          <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1N5vedE2uBhK8kS7SaKMAVf2"
  publishable-key="pk_test_51N4siGE2uBhK8kS7La9uVUryR8lFVZTVECfQiJEKZF7W8bzj9RHrdC9uF4eYpCPslxyZpar9pRjvCYOinEHifsrh00Ff4CQ7ms"
>
</stripe-buy-button>
<?php }else{ 
              header("Location:argosproject.fr/login");
            }?>
        </div>
      </div>
      <div class="pricing__card pricing-card pricing-card_premium">
        <div class="pricing-card__top">
          <div class="pricing-card__title">Premium</div>
          <div class="pricing-card__price">20.99€</div>
        </div>
        <div class="pricing-card__body">
          <div class="pricing-card__pluses">
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>Advanced database access</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>uncensored password</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text"><strong>Unlimited search limits</strong></div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text">Research history</div>
            </div>
            <div class="pricing-card__plus">
              <div class="pricing-card__plus-icon"><i class="material-icons">✔</i></div>
              <div class="pricing-card__plus-text">Alert system</div>
            </div>
            </div>
            <?php 
            if (isset($_SESSION["id"]) && $_SESSION["grade"] !== 4 && $_SESSION["grade"] !== 5 && $_SESSION["grade"] !== 6 && $_SESSION["grade"] !== 7 && $_SESSION["grade"] !== 8 && $_SESSION["grade"] !== 9 && $_SESSION["grade"] !== 10){ ?>
            <script async
  src="https://js.stripe.com/v3/buy-button.js">
</script>

<stripe-buy-button
  buy-button-id="buy_btn_1N5wWBE2uBhK8kS7LYvV3q3o"
  publishable-key="pk_test_51N4siGE2uBhK8kS7La9uVUryR8lFVZTVECfQiJEKZF7W8bzj9RHrdC9uF4eYpCPslxyZpar9pRjvCYOinEHifsrh00Ff4CQ7ms"
>
</stripe-buy-button>
<?php }else{ 
              header("Location:argosproject.fr/login");
            }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
          <style>
:root {
  --card-color: #10162f;
}
.container {
  max-width: 1170px;
  padding: 0 15px;
  margin: 0 auto;
}
.pricing {
  padding: 60px 0;
 
}
.pricing__grid {
  display: grid;
  gap: 30px;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}
.pricing__title {
  font-size: 48px;
  font-weight: 900;
  text-align: center;
  color: #fff;
  margin-bottom: 60px;
  line-height: 1;
}
.pricing-card {
  border-radius: 15px;
  display: flex;
  flex-direction: column;
  background: #edf2ff;
  border: 0px solid transparent;
  transition: all 0.6s ease;
  transform: perspective(1000px);
}
.pricing-card:hover {
  transform: perspective(1000px) scale(0.97) translateZ(10px) rotateY(-10deg);
  border-color: #1b4cc8;
}
.pricing-card:hover .pricing-card__top {
  transform: perspective(1000px) translateZ(5px) scale(1.01) translateX(-20px) translateY(-15px);
  opacity: 0.9;
}
.pricing-card:hover .pricing-card__button a {
  transform: perspective(1000px) translateZ(5px) scale(1.01) translateX(-15px) translateY(5px);
}
.pricing-card__top {
  transition: all 0.6s ease;
  border-top-left-radius: 14px;
  border-top-right-radius: 14px;
  background: var(--card-color);
  position: relative;
  padding: 20px 30px;
  color: #fff;
  display: flex;
  flex-direction: column;
  transform: perspective(1000px);
}
.pricing-card__title {
  font-weight: 700;
  font-size: 36px;
  margin-bottom: 80px;
}
.pricing-card__price {
  font-size: 700;
  font-size: 24px;
  align-self: flex-end;
}
.pricing-card__price span {
  font-weight: 300;
  font-size: 14px;
}
.pricing-card__body {
  padding: 30px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.pricing-card__pluses {
  flex: 1;
  margin-bottom: 30px;
}
.pricing-card__plus {
  font-size: 16px;
  color: #444;
  display: flex;
  align-items: center;
  font-weight: 300;
}
.pricing-card__plus:not(:last-child) {
  margin-bottom: 10px;
}
.pricing-card__plus-icon {
  margin-right: 15px;
  line-height: 1;
  color: var(--card-color);
}
.pricing-card__plus-text,
.pricing-card__button {
  display: flex;
  justify-content: flex-end;
}
.pricing-card__plus-text a,
.pricing-card__button a {
  display: inline-flex;
  height: 40px;
  width: 160px;
  align-items: center;
  justify-content: center;
  text-align: center;
  background: var(--card-color);
  color: #fff;
  font-weight: 700;
  font-size: 18px;
  text-decoration: none;
  border-radius: 10px;
  transition: all 0.6s ease;
  border: 1px solid transparent;
  transform: perspective(1000px);
}
.pricing-card_free {
  --card-color: #10162f;
}
.pricing-card_premium {
  --card-color: #10162f;
}
    </style>

  </main>
    <!--Footer-->
      <?php 
      require("elements/footer.php");
      ?>
    </body>
</html>