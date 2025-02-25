<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Box;

class BoxController extends Controller
{
    protected $boxModel;

    public function __construct($db)
    {
        $this->boxModel = new Box($db);
    }

    // Display a list of boxes
    public function index()
    {
        $boxes = $this->boxModel->getAll();
        include '../views/boxes/list.php';
    }

    // Display the details of a specific box
    public function show($id)
    {
        $box = $this->boxModel->getById($id);
        include '../views/boxes/details.php';
    }

    // Handle the creation of a new box
    public function store($data)
    {
        $result = $this->boxModel->create($data);
        echo json_encode(['success' => $result]);
    }

    // Handle the update of an existing box
    public function update($id, $data)
    {
        $result = $this->boxModel->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    // Handle the deletion of a box
    public function destroy($id)
    {
        $result = $this->boxModel->delete($id);
        echo json_encode(['success' => $result]);
    }
}

?>