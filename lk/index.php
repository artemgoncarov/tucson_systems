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
        <div class="row profile">
            <div class="col-md-3">
                <!-- Изображение пользователя -->
                <figure>
                    <img src="" alt="Аватар" class="img img-fluid rounded-circle" style="max-width: 300">
                    <figcaption>
                        <h4 class="namesurname"></h4>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-9">
                <!-- Имя и фамилия пользователя -->
                <h3>Информация о пользователе</h3>
                <br>
                <!-- Поля с информацией -->
                <div class="row mt-3 profile-info">
                    <div class="col-md-6">
                        <p><strong>ВКонтакте:</strong> <span id="vk_link"></span></p>
                        <p><strong>Должность:</strong> <span id="lvl"></span></p>
                        <p><strong>Дата регистрации:</strong> <span id="date"></span></p>
                    </div>
                </div>
            </div>
        </div>
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
    <br>
    <br>
    <footer class="bg-dark text-center text-light py-3">
        <p>&copy; 2023 SAMP Arizona Role Play. Все права защищены</p>
        <a style="text-decoration: none;" href="https://vk.com/artyomjk">artemgoncarov</a>
    </footer>
    <script>
        const ranks = {
            0: 'Игрок',
            1: 'Заместитель фракции',
            2: 'Лидер фракции',
            3: 'Следящий за фракцией',
            4: 'Заместитель ГС за фракцией',
            5: 'Гл. следящий за фракцией',
            6: 'Куратор',
            7: 'Зам. Гл. Администратора',
            8: 'Главный Администратор',
            9: 'Разработчик'
        }

        const fractions = {
            31: 'отсутствует',
            0: 'Полиция ЛС',
            1: 'Полиция СФ',
            2: 'Тюрьма строго режима LV',
            3: 'TV студия',
            4: 'East Side Ballas',
            5: 'Russian Mafia',
            6: 'Warlock MC',
            7: 'Больница LV',
            8: 'Night Wolves',
            9: 'Хитманы',
            10: 'Больница Jefferson',
            11: 'RCSD',
            12: 'Больница LS',
            13: 'Больница СФ',
            14: 'Grove Street',
            15: 'Varrios Los Aztecas',
            16: 'Yakuza',
            17: 'Армия ЛС',
            18: 'LVPD',
            19: 'TV студия SF',
            20: 'Страховая компания',
            21: 'FBI',
            22: 'Правительство LS',
            23: 'Центр лицензирования',
            24: 'Los Santos Vagos',
            25: 'The Rifa',
            26: 'La Cosa Nostra',
            27: 'Центральный Банк',
            28: 'TV студия LV',
            29: 'Армия SF',
            30: 'Tierra Robada Bikers',
        }
        if (localStorage.token && JSON.parse(localStorage.token).token) {
            Api.post("/api/admin/getImg.php", {
                token: JSON.parse(localStorage.token).token,
            }).then((data) => {
                // document.querySelector(".name-surname").style.display = "inline-block";
                document.querySelector(".lk").style.display = "inline-block";

                // console.log(data);
                document.querySelector(".image").setAttribute("src", data['img']);
                document.querySelector(".img").setAttribute("src", data['img']);
                document.querySelector(".name-surname").innerText = data['name'] + " " + data['surname'];
                document.querySelector(".namesurname").innerText = data['name'] + " " + data['surname'];
                document.querySelector("#vk_link").innerText = 'https://vk.com/id' + data['vk_id'];
                document.querySelector("#lvl").innerText = ranks[Number(data['lvl'])];
                document.querySelector("#date").innerText = data['date'];
            });
        } else {
            document.querySelector('body').style.display = 'none';
            location.href = "https://oauth.vk.com/authorize?client_id=<?= ID ?>&display=page&redirect_uri=<?= URL ?>&scope=photos&response_type=code&v=5.131";
        }
    </script>
</body>

</html>