<?php
require_once(__DIR__ . '/../config.php');
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
        "/public/js/check.js",
        "/public/js/component.js",
    ];
    $v = time();
    foreach ($css_files as $css) {
        echo "<link rel='stylesheet' href='$css?v=$v' />";
    };
    foreach ($js_files as $js) {
        echo "<script src='$js?v=$v'></script>";
    };
    ?>
    <script>
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

        const ministries = {
            0: "не следит",
            1: "Министерство юстиции",
            2: "Министерство обороны",
            3: "Министерство здравоохранения",
            4: "Средства массовой информации",
            5: "Центральный аппарат"
        }

        const vacancies = {
            0: "Администратор",
            1: "Следящий",
            2: "ЗГС",
            3: "ГС",
            4: "Куратор",
            5: "ЗГА",
            6: "ГА"
        }

        const components = () => {
            zamsComponent();
            leadersComponent();
            developersComponent();
            adminsComponent();
        }

        const zamsComponent = () => {
            const table = document.getElementById('zams-template');
            Api.post("https://artemgoncarov.online/api/admin/zams/getZams.php").then((data) => {
                let newStr = table.insertRow();

                let name = newStr.insertCell(0);
                let vk_link = newStr.insertCell(1);
                let fraction = newStr.insertCell(2);
                let warns = newStr.insertCell(3);
                let date = newStr.insertCell(4); //
                name.innerText = data[0].nick;
                vk_link.innerText = 'https://vk.com/id' + data[0].vk_id;
                fraction.innerText = fractions[data[0].fraction];
                warns.innerText = data[0].warns;
                date.innerText = data[0].date;
            })
        }
        const leadersComponent = () => {
            let table = document.getElementById('leaders-template');
            Api.post("https://artemgoncarov.online/api/admin/leaders/getLeaders.php").then((data) => {
                let newStr = table.insertRow();

                let name = newStr.insertCell(0);
                let vk_link = newStr.insertCell(1);
                let fraction = newStr.insertCell(2);
                let warns = newStr.insertCell(3);
                let date = newStr.insertCell(4);

                name.innerText = data[0].nick;
                vk_link.innerText = 'https://vk.com/id' + data[0].vk_id;
                fraction.innerText = fractions[data[0].fraction];
                warns.innerText = data[0].warns;
                date.innerText = data[0].date;
            })
        }

        const developersComponent = () => {
            let table = document.getElementById('developers-template');
            Api.post("https://artemgoncarov.online/api/admin/developers/getDevelopers.php").then((data) => {
                let newStr = table.insertRow();

                let name = newStr.insertCell(0);
                let vk_link = newStr.insertCell(1);
                let way = newStr.insertCell(2);
                let stack = newStr.insertCell(3);
                let date = newStr.insertCell(4);

                name.innerText = data[0].name;
                vk_link.innerText = 'https://vk.com/id' + data[0].vk_id;
                way.innerText = data[0].way;
                stack.innerText = data[0].stack;
                date.innerText = data[0].date;
            })
        }

        const adminsComponent = () => {
            let table = document.getElementById('admins-template');
            Api.post("https://artemgoncarov.online/api/admin/admins/getAdmins.php").then((data) => {
                let newStr = table.insertRow();

                let name = newStr.insertCell(0);
                let vk_link = newStr.insertCell(1);
                let lvl = newStr.insertCell(2);
                let ministry = newStr.insertCell(3);
                let vacancy = newStr.insertCell(4);
                let date = newStr.insertCell(5);


                name.innerText = data[0].nick;
                vk_link.innerText = 'https://vk.com/id' + data[0].vk_id;
                lvl.innerText = data[0].lvl;
                ministry.innerText = ministries[data[0].ministry];
                vacancy.innerText = vacancies[data[0].vacancy];
                date.innerText = data[0].date;
            })
        }

        window.onload = components;
    </script>
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
    <div class="container">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="developers-tab" data-toggle="tab" href="#developers" role="tab" aria-controls="developers" aria-selected="true">Разработчики</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="zams-tab" data-toggle="tab" href="#zams" role="tab" aria-controls="zams" aria-selected="false">Заместители</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="leaders-tab" data-toggle="tab" href="#leaders" role="tab" aria-controls="leaders" aria-selected="false">Лидеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admins-tab" data-toggle="tab" href="#admins" role="tab" aria-controls="admins" aria-selected="false">Администраторы</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="developers" role="tabpanel" aria-labelledby="developers-tab">
                <table class="table" id="developers-template">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для developers -->
                    <thead>
                        <tr>
                            <th>Ник</th>
                            <th>Ссылка на ВК</th>
                            <th>Направление</th>
                            <th>Стек</th>
                            <th>Дата назначения</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="zams" role="tabpanel" aria-labelledby="zams-tab">
                <table id="zams-template" class="table">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для zams -->
                    <thead>
                        <tr>
                            <th>Ник</th>
                            <th>Ссылка на ВК</th>
                            <th>Фракция</th>
                            <th>Выговоры</th>
                            <th>Дата назначения</th>
                            <!-- <th>Онлайн за неделю</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="leaders" role="tabpanel" aria-labelledby="leaders-tab">
                <table class="table" id="leaders-template">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для leaders -->
                    <thead>
                        <tr>
                            <th>Ник</th>
                            <th>Ссылка на ВК</th>
                            <th>Фракция</th>
                            <th>Выговоры</th>
                            <th>Дата назначения</th>
                            <!-- <th>Онлайн за неделю</th> -->
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="admins" role="tabpanel" aria-labelledby="admins-tab">
                <table class="table" id="admins-template">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для admins -->
                    <thead>
                        <tr>
                            <th>Ник</th>
                            <th>Ссылка на ВК</th>
                            <th>Уровень админки</th>
                            <th>Сл. за министерством</th>
                            <th>Должность</th>
                            <th>Дата назначения</th>
                        </tr>
                    </thead>
                </table>
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

    <footer class="bg-dark text-center text-light py-3">
        <p>&copy; 2023 SAMP Arizona Role Play. Все права защищены</p>
        <a style="text-decoration: none;" href="https://vk.com/artyomjk">artemgoncarov</a>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>