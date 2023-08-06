<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="zamestiteli-tab" data-toggle="tab" href="#zamestiteli" role="tab" aria-controls="zamestiteli" aria-selected="false">Заместители</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="lideri-tab" data-toggle="tab" href="#lideri" role="tab" aria-controls="lideri" aria-selected="false">Лидеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admini-tab" data-toggle="tab" href="#admini" role="tab" aria-controls="admini" aria-selected="false">Администраторы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="razrabotchiki-tab" data-toggle="tab" href="#razrabotchiki" role="tab" aria-controls="razrabotchiki" aria-selected="true">Разработчики</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="zamestiteli" role="tabpanel" aria-labelledby="zamestiteli-tab">
                <table class="table">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для заместителей -->
                </table>
            </div>
            <div class="tab-pane fade" id="lideri" role="tabpanel" aria-labelledby="lideri-tab">
                <table class="table">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для лидеров -->
                </table>
            </div>
            <div class="tab-pane fade" id="admini" role="tabpanel" aria-labelledby="admini-tab">
                <table class="table">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для администраторов -->
                </table>
            </div>
            <div class="tab-pane fade show active" id="razrabotchiki" role="tabpanel" aria-labelledby="razrabotchiki-tab">
                <table class="table">
                    <!-- Ваша таблица со столбцами: ник, ВК, должность, фракция и дата регистрации для разработчиков -->
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>