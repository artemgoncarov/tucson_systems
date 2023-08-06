<?php

require_once(__DIR__ .'/../../../api.php');

$req = request();

$query = "INSERT INTO users (name, surname, img, vk_id, lvl, last_ip) VALUES (:name, :surname, :img, :vk_id, :lvl, :last_ip)";
dbWrite($query, [
    "name" => $req['name'],
    "surname" => $req['surname'],
    "img" => $req['img'],
    "vk_id" => $req['vk_id'],
    "lvl" => $req['lvl'],
    "last_ip" => $_SERVER['REMOTE_ADDR'],
]);
?>