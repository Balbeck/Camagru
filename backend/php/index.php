<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:3000"); // Ajustez selon votre configuration frontend
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require_once 'routes/api.php';
