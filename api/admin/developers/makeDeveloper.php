<?php

require_once(__DIR__ . '/../../../api.php');

$req = request();

$query = "SELECT * FROM tokens WHERE token=:token";
$data = dbRead($query, ["token" => $req["token"]]);
if ($data) {
    $query1 = "INSERT INTO developers (vk_id, way, stack) VALUES (:vk_id, :way, :stack)";
    dbWrite($query1, [
        "vk_id" => $req['vk_id'],
        "way" => $req['way'],
        "stack" => $req['stack'],
    ]);
}
