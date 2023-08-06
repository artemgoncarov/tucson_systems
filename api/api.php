<?php
// Устанавливаем код ответа 200 HTTP
http_response_code(200);

// Отправляем заголовок, чтобы указать, что данные будут возвращены в формате JSON
header('Content-Type: application/json');

// Создаем ассоциативный массив с данными, которые хотим вернуть
$response = array(
    'status' => 'success',
    'message' => 'API работает успешно!',
    'made_by' => 'lindberg13 :3',
    'timestamp_msk' => date('Y-m-d H:i:s'),
);

// Преобразуем массив в формат JSON и выводим его
echo json_encode($response);
?>
