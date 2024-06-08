<?php

class AdCategoryModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBaseModel();
    }
    public function getAllCate()
    {
        $sql = "SELECT * FROM category";
        return $this->db->getAll($sql);
    }
    public function getIdCate($id)
    {
        $sql = "SELECT * FROM category WHERE id = " . $id;
        return $this->db->getOne($sql);
    }

    public function insertCate($data)
    {
        $sql = "INSERT INTO category(name, image) VALUES (?,?)";
        $params = [$data['name'], $data['image']];
        return $this->db->insert($sql, $params);
    }
    public function delCate($id)
    {
        $sql = "DELETE FROM category WHERE id = " . $id;
        return $this->db->del($sql, [$id]);
    }
    public function updateCate($data)
    {
        $sql = "UPDATE category 
                SET name = :name, image = :image
                WHERE id = :id";
        $params = [
            ':name' => $data['name'],
            ':image' => $data['image'],
            ':id' => $data['id']
        ];
        return $this->db->insert($sql, $params);
    }
}
