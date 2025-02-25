<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Core\Database;
use App\Controllers\BoxController;
use App\Controllers\ItemController;

// Initialize the database connection
$db = new Database();

// Route the request to the appropriate controller
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '/' && $requestMethod === 'GET') {
    // Display the home page
    include '../views/layout/header.php';
    echo '<h1>Welcome to Home Warehouse IMS</h1>';
    include '../views/layout/footer.php';
} elseif (preg_match('/^\/boxes(\/.*)?$/', $requestUri)) {
    // Route to BoxController
    $boxController = new BoxController($db);
    if ($requestMethod === 'GET' && preg_match('/^\/boxes\/(\d+)$/', $requestUri, $matches)) {
        // Display a specific box
        $boxController->show($matches[1]);
    } elseif ($requestMethod === 'GET') {
        // Display the list of boxes
        $boxController->index();
    } elseif ($requestMethod === 'POST') {
        // Create a new box
        $boxController->store($_POST);
    } elseif ($requestMethod === 'PUT' && preg_match('/^\/boxes\/(\d+)$/', $requestUri, $matches)) {
        // Update an existing box
        parse_str(file_get_contents("php://input"), $putVars);
        $boxController->update($matches[1], $putVars);
    } elseif ($requestMethod === 'DELETE' && preg_match('/^\/boxes\/(\d+)$/', $requestUri, $matches)) {
        // Delete a box
        $boxController->destroy($matches[1]);
    } else {
        // Display a 404 Not Found page
        http_response_code(404);
        include '../views/layout/header.php';
        echo '<h1>404 Not Found</h1>';
        include '../views/layout/footer.php';
    }
} elseif (preg_match('/^\/items(\/.*)?$/', $requestUri)) {
    // Route to ItemController
    $itemController = new ItemController($db);
    if ($requestMethod === 'GET' && preg_match('/^\/items\/(\d+)$/', $requestUri, $matches)) {
        // Display a specific item
        $itemController->show($matches[1]);
    } elseif ($requestMethod === 'GET') {
        // Display the list of items
        $itemController->index();
    } elseif ($requestMethod === 'POST') {
        // Create a new item
        $itemController->store($_POST);
    } elseif ($requestMethod === 'PUT' && preg_match('/^\/items\/(\d+)$/', $requestUri, $matches)) {
        // Update an existing item
        parse_str(file_get_contents("php://input"), $putVars);
        $itemController->update($matches[1], $putVars);
    } elseif ($requestMethod === 'DELETE' && preg_match('/^\/items\/(\d+)$/', $requestUri, $matches)) {
        // Delete an item
        $itemController->destroy($matches[1]);
    } else {
        // Display a 404 Not Found page
        http_response_code(404);
        include '../views/layout/header.php';
        echo '<h1>404 Not Found</h1>';
        include '../views/layout/footer.php';
    }
} else {
    // Display a 404 Not Found page
    http_response_code(404);
    include '../views/layout/header.php';
    echo '<h1>404 Not Found</h1>';
    include '../views/layout/footer.php';
}

?>