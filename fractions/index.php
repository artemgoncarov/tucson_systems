<?php
require_once(__DIR__ . '/../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <?php
    $css_files = [
        '/public/css/styles.css'
    ];
    $js_files = [
        "/public/js/api.js",
        "/public/js/tokenStorage.js",
        "/public/js/postData.js",
    ];
    $v = time();
    foreach ($css_files as $css) {
        echo "<link rel='stylesheet' href='$css?v=$v' />";
    };
    foreach ($js_files as $js) {
        echo "<script src='$js?v=$v'></script>";
    };
    ?>
    <link rel="shortcut icon" href="https://sun9-40.userapi.com/impg/DCAVbtdrvyOF0i5ED98-4q2Ime4klnm8BAV2NA/T-LGbnak_Sw.jpg?size=520x0&quality=95&sign=bb215395fbd5c4c3dfc5abcda425c3a3" type="image/png">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <button onclick="location.href='https://artemgoncarov.online/'" type="button" class="btn btn-primary">Главная</button>
        <div class="lk">
            <button class="btn btn-primary" onclick="location.href='/apanel'">
                Панель управления
            </button>
            <button class="btn btn-primary" onclick="location.reload()">
                <span class="name-surname"></span>
                <img id=" img" class="image" src="" alt="Фотография профиля">
            </button>
        </div>
    </nav>
    <div class="container mt-3">
        <!-- <div class="row profile"> -->
        <!-- <div class="col-md-3"> -->
        <!-- Изображение пользователя -->
        <!-- <figure> -->
        <!-- <img src="" alt="Аватар" class="img img-fluid rounded-circle" style="max-width: 300"> -->
        <!-- <figcaption> -->
        <!-- <h4 class="namesurname"></h4> -->
        <!-- </figcaption> -->
        <!-- </figure> -->
        <!-- </div> -->
        <!-- <div class="col-md-9"> -->
        <!-- Имя и фамилия пользователя -->
        <!-- <h3>Информация о пользователе</h3> -->
        <!-- <br> -->
        <!-- Поля с информацией -->
        <!-- <div class="row mt-3 profile-info"> -->
        <!-- <div class="col-md-6"> -->
        <!-- <p><strong>ВКонтакте:</strong> <span id="vk_link"></span></p> -->
        <!-- <p><strong>Должность:</strong> <span id="lvl"></span></p> -->
        <!-- <p><strong>Дата регистрации:</strong> <span id="date"></span></p> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
    </div>
    <script>
        const url = "https://arizona-rp.com/fractions/tucson/1/";

        // Отправка GET-запроса с помощью функции fetch
        fetch(url)
            .then((response) => {
                // Проверяем, успешно ли был выполнен запрос (статус 200-299)
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                // Возвращаем содержимое ответа в формате текста
                return response.text();
            })
            .then((data) => {
                // Здесь вы можете обрабатывать полученные данные (код страницы)
                console.log(data);
            })
            .catch((error) => {
                // Обрабатываем возможную ошибку
                console.error("Fetch error:", error);
            });
    </script>
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
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->
    <footer class="bg-dark text-center text-light py-3">
        <p>&copy; 2023 SAMP Arizona Role Play. Все права защищены</p>
        <a style="text-decoration: none;" href="https://vk.com/artyomjk">artemgoncarov</a>
    </footer>
</body>

</html>