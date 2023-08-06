<?php
require_once(__DIR__ . '/../api.php');

dbWrite("CREATE TABLE leaders (vk_id INT UNIQUE, nick VARCHAR(255),warns INT DEFAULT 0,date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,fraction INT,total_days INT DEFAULT 0)");
