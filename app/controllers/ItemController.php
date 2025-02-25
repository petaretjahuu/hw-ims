<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Item;

class ItemController extends Controller
{
    protected $itemModel;

    public function __construct($db)
    {
        $this->itemModel = new Item($db);
    }

    // Display a list of items
    public function index()
    {
        $items = $this->itemModel->getAll();
        include '../views/items/list.php';
    }

    // Display the details of a specific item
    public function show($id)
    {
        $item = $this->itemModel->getById($id);
        include '../views/items/details.php';
    }

    // Handle the creation of a new item
    public function store($data)
    {
        $result = $this->itemModel->create($data);
        echo json_encode(['success' => $result]);
    }

    // Handle the update of an existing item
    public function update($id, $data)
    {
        $result = $this->itemModel->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    // Handle the deletion of an item
    public function destroy($id)
    {
        $result = $this->itemModel->delete($id);
        echo json_encode(['success' => $result]);
    }
}

?>