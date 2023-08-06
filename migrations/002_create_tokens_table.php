<?php
require_once(__DIR__ . '/../api.php');

dbWrite("CREATE TABLE tokens (vk_id INT UNIQUE, token VARCHAR(255) UNIQUE)");
