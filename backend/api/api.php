<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:3000"); // Ajustez selon votre configuration frontend
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once 'controllers/AuthController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] !== 'api') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$controller = new AuthController();

switch($uri[2]) {
    case 'signup':
        $controller->signup($requestMethod);
        break;
    case 'signin':
        $controller->signin($requestMethod);
        break;
    case 'forgot-password':
        $controller->forgotPassword($requestMethod);
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        exit();
}
