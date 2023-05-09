<?php
$m_user = "root";
$m_password = "";
$m_address = "localhost";
$m_db = "marketing";

$conn = new mysqli($m_address, $m_user, $m_password, $m_db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}