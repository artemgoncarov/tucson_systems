<?php

require_once(__DIR__ .'/../../../api.php');

$query = "INSERT INTO users (name, surname, img, vk_id, lvl, last_ip) VALUES (:name, :surname, :img, :vk_id, :lvl, :last_ip)";
dbWrite($query, [
    "name" => "123",
    "surname" => "123",
    "img" => "123",
    "vk_id" => 123,
    "lvl" => 0,
    "last_ip" => "123",
]);