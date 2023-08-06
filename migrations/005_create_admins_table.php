<?php
require_once(__DIR__ . '/../api.php');

dbWrite("CREATE TABLE admins (vk_id INT UNIQUE,nick VARCHAR(255),lvl INT DEFAULT 1,warns INT DEFAULT 0,date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,ministry INT,vacancy INT,total_days INT DEFAULT 0)");
