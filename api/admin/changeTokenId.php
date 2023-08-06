<?php

require_once(__DIR__ . '/../../api.php');

$req = request();

$query = "UPDATE tokens SET id=:id WHERE vk_id=:vk_id";
dbWrite($query, [
    "vk_id" => $req['vk_id'],
    "id" => $req['id']
]);
