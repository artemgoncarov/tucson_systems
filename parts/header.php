<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admins system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/styles.css">
  <link rel="shortcut icon" href="https://sun9-40.userapi.com/impg/DCAVbtdrvyOF0i5ED98-4q2Ime4klnm8BAV2NA/T-LGbnak_Sw.jpg?size=520x0&quality=95&sign=bb215395fbd5c4c3dfc5abcda425c3a3" type="image/png">

  <?php
  $css_files = [
    '/public/css/styles.css'
  ];
  $js_files = [
    "/public/js/api.js",
    "/public/js/tokenStorage.js",
    "/public/js/postData.js"
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
      <button class="nav-btn-1"><a style="text-decoration: none; color: aliceblue" href="https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131">Зарегистрироваться</a></button>
      <button class="nav-btn-2"><a style="text-decoration: none; color: aliceblue" href="https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131">Войти</a></button>
      <div class="lk">
        <span class="name-surname""></span>
        <img id=" img" class="image" src="" alt="Фотография профиля">
      </div>
      <script>
        if (localStorage.token && JSON.parse(localStorage.token).token) {
          Api.post("/api/admin/getImg.php", {
            token: JSON.parse(localStorage.token).token,
          }).then((data) => {
            console.log(123);
            document.querySelector(".nav-btn-1").style.display = "none";
            document.querySelector(".nav-btn-2").style.display = "none"
            // document.querySelector(".name-surname").style.display = "inline-block";
            document.querySelector(".lk").style.display = "inline-block";

            // console.log(data);
            document.querySelector(".image").setAttribute("src", data['img']);
            document.querySelector(".name-surname").innerText = data['name'] + " " + data['surname'];
          });
        }
      </script>
    </div>
  </div>