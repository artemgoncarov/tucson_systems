<?php

require_once(__DIR__ . '/../../../api.php');


$req = request();

$query = "SELECT * FROM tokens WHERE token=:token";
$data = dbRead($query, ["token" => $req["token"]]);
if ($data) {
    $query1 = "INSERT INTO zams (vk_id, nick, fraction) VALUES (:vk_id, :nick, :fraction)";
    dbWrite($query1, [
        "vk_id" => $req['vk_id'],
        "nick" => $req['nick'],
        "fraction" => $req['fraction']
    ]);
}
