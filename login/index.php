<?php
// Подключение к базе данных SQLite
$database = new SQLite3('../datebase/db.db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получение введенных пользователем данных
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Хеширование введенного пароля
    $hashedPassword = md5($password);

    // Проверка введенных данных с данными из базы данных
    $query = "SELECT username, status FROM storage_users WHERE username = :username AND password = :password";
    $statement = $database->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $hashedPassword);
    $result = $statement->execute();

    if ($row = $result->fetchArray()) {
        // Проверяем статус пользователя
        if ($row['status'] == 'access') {
            // Вход успешен
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: ../apanel/admin_panel.php');
            exit();
        } else {
            // Ошибка доступа
            $message = 'Ошибка доступа. Ваш статус не позволяет войти в панель.';
            // Можно добавить дополнительную обработку ошибки доступа, например, вывод сообщения об ошибке
        }
    } else {
        // Вход не удался
        $message = 'Неверное имя пользователя или пароль.';
        // Можно добавить дополнительную обработку неудачного входа, например, вывод сообщения об ошибке
    }

    // Отправка ответа в формате JSON
    $response = array('message' => $message);
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Закрытие соединения с базой данных
$database->close();
?>