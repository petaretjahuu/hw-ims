<?php

namespace App\Models;

use App\Core\Database;

class Item
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    // Get all items
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM items");
        return $this->db->fetchAll($stmt);
    }

    // Get an item by ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM items WHERE id = :id");
        $this->db->execute($stmt, ['id' => $id]);
        return $this->db->fetch($stmt);
    }

    // Create a new item
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO items (name, description, box_id) VALUES (:name, :description, :box_id)");
        return $this->db->execute($stmt, [
            'name' => $data['name'],
            'description' => $data['description'],
            'box_id' => $data['box_id']
        ]);
    }

    // Update an existing item
    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE items SET name = :name, description = :description, box_id = :box_id WHERE id = :id");
        return $this->db->execute($stmt, [
            'id' => $id,
            'name' => $data['name'],
            'description' => $data['description'],
            'box_id' => $data['box_id']
        ]);
    }

    // Delete an item
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM items WHERE id = :id");
        return $this->db->execute($stmt, ['id' => $id]);
    }
}

?>