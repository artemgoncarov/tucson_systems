<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tucson Systems</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="https://sun9-40.userapi.com/impg/DCAVbtdrvyOF0i5ED98-4q2Ime4klnm8BAV2NA/T-LGbnak_Sw.jpg?size=520x0&quality=95&sign=bb215395fbd5c4c3dfc5abcda425c3a3" type="image/png">
  <?php
  $css_files = [
    '/public/css/styles.css'
  ];
  $js_files = [
    "/public/js/api.js",
    "/public/js/tokenStorage.js",
    "/public/js/postData.js",
    "/public/js/check.js"
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
  <nav class="navbar navbar-dark bg-dark bg-gradient">
    <button onclick="location.href='https://artemgoncarov.online/'" type="button" class="btn btn-primary">Главная</button>
    <div class="rt">
      <button style="margin-left: 10px;" type="submit" class="nav-btn-1 btn btn-primary" onclick='location.href = "https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131";'>Зарегистрироваться</button>
      <button style="margin-left: 10px;" type="submit" class="nav-btn-2 btn btn-primary" onclick='location.href = "https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131";'>Войти</button>
    </div>
    <div class="lk">
      <button class="btn btn-primary" onclick="location.href='/apanel'">
        Панель управления
      </button>
      <button class="btn btn-primary" onclick="location.href='/lk'">
        <span class="name-surname"></span>
        <img id=" img" class="image" src="" alt="Фотография профиля">
      </button>
    </div>
  </nav>

  <div class="jumbotron text-center main">
    <h1>Tucson Systems</h1>
    <p>Панель управления лидеров и администраторов Arizona RP</p>
    <a href="https://arizona-rp.com/" class="btn btn-primary btn-lg">Начать играть</a>
  </div>
  <section class="container py-5">
    <div class="text-center">
      <h2>Помощь</h2>
      <p class="lead">by artemgoncarov</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="https://vk.com/tucson_forever">VK</a></li>
        <li class="list-inline-item"><a href="https://arizonaroleplay.com/forum">Forum</a></li>
        <li class="list-inline-item"><a href="https://discord.gg/tucson">Discord</a></li>
      </ul>
    </div>
  </section>

  <footer class="bg-dark text-center text-light py-3">
    <p>&copy; 2023 SAMP Arizona Role Play. Все права защищены</p>
    <a style="text-decoration: none;" href="https://vk.com/artyomjk">artemgoncarov</a>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>