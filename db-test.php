<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli("localhost", "qaswa_user", "Akram890@#1gh", "qaswa_telecom");

if ($mysqli->connect_error) {
    die("❌ Database connection failed: " . $mysqli->connect_error);
}
echo "✅ Database connected successfully!";
?>
