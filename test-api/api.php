<?php

// Параметры подключения к базе данных
$servername = 'localhost';
$dbname = 'u2162796_default';
$password = 'osspR77OWH6l6qdi';
$username = 'u2162796_default';

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// Получение данных из базы данных по vk_id
if (isset($_GET['vk_id'])) {
    $vk_id = $_GET['vk_id'];
    $sql = "SELECT name, surname FROM users WHERE vk_id = '$vk_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        // Преобразование данных в JSON и отправка клиенту с указанием кодировки
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    } else {
        // Обработка случая, когда vk_id не найден
        echo "User not found.";
    }
}

$conn->close();
