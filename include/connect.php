<?php
// Database connnection settings

$host = 'localhost';
$name = 'root';
$pass = '';
$db = 'financial_report';

$conn = new mysqli($host, $name, $pass, $db);

if ($conn->connect_error){
    die("connection failed:" . $conn->connect_error);
}



?>