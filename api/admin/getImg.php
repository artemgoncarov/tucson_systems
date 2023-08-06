<?php

require_once(__DIR__ . '/../../api.php');

$req = request();

$query = "SELECT * FROM tokens WHERE token=:token";
$data = dbRead($query, ["token" => $req["token"]]);
if ($data) {
    $query1 = "SELECT * FROM users where vk_id=:vk_id";
    $data1 = dbRead($query1, ["vk_id" => $data[0]['vk_id']]);
    response([
        "name" => $data1[0]['name'],
        "surname" => $data1[0]['surname'],
        "img" => $data1[0]['img'],
        "vk_id" => $data1[0]['vk_id'],
        "lvl" => $data1[0]['lvl'],
        "date" => $data1[0]['date'],
    ]);
}
