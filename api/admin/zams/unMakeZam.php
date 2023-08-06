<?php

require_once(__DIR__ . '/../../../api.php');


$req = request();

$query = "SELECT * FROM tokens WHERE token=:token";
$data = dbRead($query, ["token" => $req["token"]]);
if ($data) {
    $query1 = "DELETE FROM zams WHERE vk_id=:vk_id";
    dbWrite($query1, [
        "vk_id" => $req['vk_id'],
    ]);
}
