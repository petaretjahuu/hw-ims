<?php

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Core\Database;
use App\Controllers\ItemController;

// Initialize the database connection
$db = new Database();

// Create an instance of the ItemController
$itemController = new ItemController($db);

// Route the request to the appropriate method in the ItemController
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    if (isset($_GET['id'])) {
        // Display the details of a specific item
        $itemController->show($_GET['id']);
    } else {
        // Display the list of items
        $itemController->index();
    }
} elseif ($requestMethod === 'POST') {
    // Handle the creation of a new item
    $itemController->store($_POST);
} elseif ($requestMethod === 'PUT') {
    // Handle the update of an existing item
    parse_str(file_get_contents("php://input"), $putVars);
    $itemController->update($putVars['id'], $putVars);
} elseif ($requestMethod === 'DELETE') {
    // Handle the deletion of an item
    parse_str(file_get_contents("php://input"), $deleteVars);
    $itemController->destroy($deleteVars['id']);
} else {
    // Display a 405 Method Not Allowed page
    http_response_code(405);
    include '../views/layout/header.php';
    echo '<h1>405 Method Not Allowed</h1>';
    include '../views/layout/footer.php';
}

?>