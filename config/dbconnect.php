<?php

require_once 'envInitializer.php';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

$conn->set_charset("utf8");
