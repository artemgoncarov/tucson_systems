<?php

require_once(__DIR__ .'/../../api.php');

$query = "INSERT INTO tokens (vk_id, token) VALUES (:vk_id, :token)";
dbWrite($query, [
    "vk_id" => 123,
    "token" => '123',
]);
response(["result" => "ok"]);