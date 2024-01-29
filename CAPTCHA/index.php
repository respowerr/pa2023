<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="captcha">
  <div id="handle">
    <span></span>
  </div>
</div>
<script src="js.js"></script>
</body>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

#captcha {
  width: 400px;
  height: 260px;
  border-radius: 4px;
  background-image: url(https://cdn.futura-sciences.com/sources/images/Napoleon-Bonaparte.png);
  background-size: cover;
  background-position: center;
  position: relative;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, .3);
}

#handle {
  width: 340px;
  height: 30px;
  border-radius: 18px;
  background-color: #eee;
  position: absolute;
  bottom: -50px;
  left: -180px;
  box-shadow: inset 0px 0px 12px rgba(0, 0, 0, .2);
  border: 3px solid #ccc;
}

#handle span {
  display: block;
  width: 80px;
  height: inherit;
  border-radius: inherit;
  background-color: #fff;
  box-shadow: inset 0px 0px 6px rgba(0, 0, 0, .25), 0px 2px 4px rgba(0, 0, 0, .3);
  position: absolute;
  cursor: move;
  transform: translateX(0);
  transition: .25s all ease-in-out;
}

#captcha.passed::before,
#captcha.passed::after,
#captcha.passed #handle {
  opacity: 0;
}
</style>
</html>