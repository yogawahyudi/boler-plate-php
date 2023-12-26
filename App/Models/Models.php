<?php
namespace App\Models;

use App\Database\Database;

class Models
{
    protected $db;
    protected $table;

    public function __construct()
    {   $this->db = new \App\Database\Database();
    }

    public function create($data)
    {
        return $this->db->create($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->select($this->table, '*', ['id' => $id], null, true);
    }

    public function getAll()
    {
        return $this->db->select($this->table);
    }

    public function update($id, $data)
    {
        $conditions = ['id' => $id];
        $this->db->update($this->table, $data, $conditions);
    }

    public function delete($id)
    {
        $conditions = ['id' => $id];
        $this->db->delete($this->table, $conditions);
    }
}
