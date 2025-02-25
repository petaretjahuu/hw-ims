<?php

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Core\Database;
use App\Controllers\BoxController;

// Initialize the database connection
$db = new Database();

// Create an instance of the BoxController
$boxController = new BoxController($db);

// Route the request to the appropriate method in the BoxController
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    if (isset($_GET['id'])) {
        // Display the details of a specific box
        $boxController->show($_GET['id']);
    } else {
        // Display the list of boxes
        $boxController->index();
    }
} elseif ($requestMethod === 'POST') {
    // Handle the creation of a new box
    $boxController->store($_POST);
} elseif ($requestMethod === 'PUT') {
    // Handle the update of an existing box
    parse_str(file_get_contents("php://input"), $putVars);
    $boxController->update($putVars['id'], $putVars);
} elseif ($requestMethod === 'DELETE') {
    // Handle the deletion of a box
    parse_str(file_get_contents("php://input"), $deleteVars);
    $boxController->destroy($deleteVars['id']);
} else {
    // Display a 405 Method Not Allowed page
    http_response_code(405);
    include '../views/layout/header.php';
    echo '<h1>405 Method Not Allowed</h1>';
    include '../views/layout/footer.php';
}

?>