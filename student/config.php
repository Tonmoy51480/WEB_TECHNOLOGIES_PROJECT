<?php

session_start();


require_once 'config/database.php';


$database = new Database();
$conn = $database->getConnection();
?>
