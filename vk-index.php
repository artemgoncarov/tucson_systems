<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admins system</title>
  <link rel="stylesheet" href="public/css/styles.css">

  <?php
    $css_files = [
        '/public/css/styles.css'
    ];
    $js_files = [
        "/public/js/api.js",
        "public/js/storage.js",
        "public/js/tokenStorage.js",
        "pubic/js/register.js"
    ];
    $v = time();
    foreach ($css_files as $css) {
        echo "<link rel='stylesheet' href='$css?v=$v' />";
    };
    foreach ($js_files as $js) {
        echo "<script src='$js?v=$v'></script>";
    };
    ?>
</head>
<body>
  <div class="header">
    <div class="nav-left">
      <button class="nav-btn" onclick="location.href='/'">Главная</button>
    </div>
    <div class="nav-right">
    <button class="nav-btn"><a style="text-decoration: none; color: aliceblue" href="https://oauth.vk.com/authorize?client_id=<?=ID?>&display=page&redirect_uri=<?=URL?>&scope=photos&response_type=code&v=5.131" target="_blank">Зарегистрироваться</a></button>
    <button class="nav-btn"><a style="text-decoration: none; color: aliceblue" href="https://oauth.vk.com/authorize?client_id=<?=ID?>&display=page&redirect_uri=<?=URL?>&scope=photos&response_type=code&v=5.131" target="_blank">Войти</a></button>
    </div>
</body>
</html>
