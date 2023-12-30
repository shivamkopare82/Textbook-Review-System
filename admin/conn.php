<?php
// Database connection settings
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mini';

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}
?>