<?php
require_once(__DIR__ . '/../api.php');

dbWrite("CREATE TABLE developers (name VARCHAR(255), vk_id INT UNIQUE, way VARCHAR(255),date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,stack VARCHAR(255))");
