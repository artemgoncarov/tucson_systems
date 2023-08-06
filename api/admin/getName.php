<?php

require_once(__DIR__ . '/../../api.php');

$req = request();

$query = "SELECT * FROM tokens WHERE token=:token";
$data = dbRead($query, ["token" => $req["token"]]);
if ($data) {
    $query1 = "SELECT name, surname FROM users where vk_id=:vk_id";
    $data1 = dbRead($query1, ["vk_id" => $data[0]['vk_id']]);
    response([$data1[0]['name'], $data1[0]['surname']]);
}
