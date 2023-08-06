<?php

require_once(__DIR__ . '/../../api.php');

$req = request();

$query = "SELECT vk_id FROM users WHERE vk_id=:vk_id";
$data = dbRead($query, ["vk_id" => $req['vk_id']]);
if ($data) {
    response(["result" => true]);
} else {
    response(["result" => false]);
}
