<?php

require_once(__DIR__ . '/../../../api.php');

$req = request();

$query1 = "SELECT * FROM developers WHERE 1";
$data = dbRead($query1);
response($data);
