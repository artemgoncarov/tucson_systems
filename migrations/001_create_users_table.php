<?php
require_once(__DIR__ . '/../api.php');

dbWrite("CREATE TABLE users (name VARCHAR(255), surname VARCHAR(255), img VARCHAR(255), vk_id INT UNIQUE, lvl INT DEFAULT 0,last_ip VARCHAR(255),date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
