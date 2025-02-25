<?php

namespace App\Models;

use App\Core\Database;

class Box
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    // Get all boxes
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM boxes");
        return $this->db->fetchAll($stmt);
    }

    // Get a box by ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM boxes WHERE id = :id");
        $this->db->execute($stmt, ['id' => $id]);
        return $this->db->fetch($stmt);
    }

    // Create a new box
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO boxes (name, description) VALUES (:name, :description)");
        return $this->db->execute($stmt, [
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    // Update an existing box
    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE boxes SET name = :name, description = :description WHERE id = :id");
        return $this->db->execute($stmt, [
            'id' => $id,
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    // Delete a box
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM boxes WHERE id = :id");
        return $this->db->execute($stmt, ['id' => $id]);
    }
}

?>