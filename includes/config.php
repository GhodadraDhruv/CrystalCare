<?php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ccms');

// Establish database connection.
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Set charset to utf8
if (!$mysqli->set_charset("utf8")) {
    echo "Error setting charset: " . $mysqli->error;
    exit();
}
?>
