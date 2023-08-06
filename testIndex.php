<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arizona Role Play Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://sun9-40.userapi.com/impg/DCAVbtdrvyOF0i5ED98-4q2Ime4klnm8BAV2NA/T-LGbnak_Sw.jpg?size=520x0&quality=95&sign=bb215395fbd5c4c3dfc5abcda425c3a3" type="image/png">
    <?php
    $js_files = [
        "/public/js/api.js",
        "/public/js/tokenStorage.js",
        "/public/js/postData.js",
        "/public/js/check.js"
    ];
    $v = time();
    foreach ($js_files as $js) {
        echo "<script src='$js?v=$v'></script>";
    };
    ?>
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f7f7f7;
        }

        .jumbotron {
            background-image: url('https://example.com/background.jpg');
            background-size: cover;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding: 150px 0;
            margin-bottom: 0;
        }

        .jumbotron h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .jumbotron p {
            font-size: 1.5rem;
        }

        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .main {
            background-image: url('https://kartinkin.net/uploads/posts/2021-07/1626766989_29-kartinkin-com-p-fon-dlya-prevyu-samp-krasivo-31.jpg');
        }

        .rt {
            position: absolute;
            right: 3%;
        }

        .image {
            max-width: 40px;
            vertical-align: middle;
        }

        .name-surname {
            justify-content: center;
            align-items: center;
            border-right: 10px;
        }

        .lk {
            text-decoration: none;
            color: #fff;
            padding: 8px 16px;
            background-color: #dc3545;
            border: none;
            border-radius: 4px;
            margin-right: 8px;
            display: none;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <button onclick="location.href='https://artemgoncarov.online/'" type="button" class="btn btn-primary">Главная</button>
        <div class="rt">
            <button style="margin-left: 10px;" type="submit" class="nav-btn-1 btn btn-primary" onclick='location.href = "https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131";'>Войти</button>
            <button style="margin-left: 10px;" type="submit" class="nav-btn-2 btn btn-primary" onclick='location.href = "https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131";'>Зарегистрироваться</button>
        </div>
        <div class="lk">
            <span class="name-surname""></span>
        <img id=" img" class="image" src="" alt="Фотография профиля">
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron text-center main">
        <h1>Arizona Role Play</h1>
        <p>Панель управления лидеров и администраторов Arizona RP</p>
        <a href="https://arizona-rp.com/" class="btn btn-primary btn-lg">Начать играть</a>
    </div>
    <!-- Contact Section -->
    <section class="container py-5">
        <div class="text-center">
            <h2>Помощь</h2>
            <p class="lead">by artemgoncarov and lindberg13</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="mailto:adskayagonchaya6@gmail.com">Email</a></li>
                <li class="list-inline-item"><a href="https://arizonaroleplay.com/forum">Forum</a></li>
                <li class="list-inline-item"><a href="https://discord.gg/tucson">Discord</a></li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-center text-light py-3">
        <p>&copy; 2023 SAMP Arizona Role Play. Все права защищены</p>
        <a style="text-decoration: none;" href="https://vk.com/artyomjk">artemgoncarov</a>
        <a style="text-decoration: none;" href="https://vk.com/moidvk">lindberg13</a>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>