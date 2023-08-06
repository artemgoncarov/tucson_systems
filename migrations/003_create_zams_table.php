<?php
require_once(__DIR__ . '/../api.php');

dbWrite("CREATE TABLE zams (vk_id INT UNIQUE, nick VARCHAR(255),warns INT DEFAULT 0,date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,fraction INT)");
