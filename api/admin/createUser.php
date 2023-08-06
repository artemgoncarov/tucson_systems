<?php

require_once(__DIR__ . '/../../api.php');

$req = request();

$query = "INSERT INTO users (name, surname) VALUES (:name, :surname)";
dbWrite($query, [
    "name" => $req['name'],
    "surname" => $req['surname'],
]);
response(["result" => "ok"]);
