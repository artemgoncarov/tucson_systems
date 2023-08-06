<?php

require_once(__DIR__ . '/../../../api.php');

$req = request();

$query = "SELECT * FROM tokens WHERE token=:token";
$data = dbRead($query, ["token" => $req["token"]]);
if ($data) {
    $query1 = "INSERT INTO admins (vk_id, nick, ministry, vacancy) VALUES (:vk_id, :nick, :ministry, :vacancy)";
    dbWrite($query1, [
        "vk_id" => $req['vk_id'],
        "nick" => $req['nick'],
        "ministry" => $req['ministry'],
        "vacancy" => $req['vacancy']
    ]);
}
