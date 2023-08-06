<?php

require_once(__DIR__ . '/../../api.php');

$req = request();

$query = "INSERT INTO tokens (vk_id, token) VALUES (:vk_id, :token)";
dbWrite($query, [
    "vk_id" => $req['vk_id'],
    "token" => $req['token'],
]);
response(["result" => "ok"]);
