<?php

class AdProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBaseModel();
    }
    public function getAllUser()
    {
        $sql = "SELECT * FROM user ORDER BY id DESC";
        return $this->db->getAll($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        return $this->db->getAll($sql);
    }
    public function getAllCate()
    {
        $sql = "SELECT * FROM category";
        return $this->db->getAll($sql);
    }
    public function getIdPro($id)
    {
        $sql = "SELECT * FROM products WHERE id = " . $id;
        return $this->db->getOne($sql);
    }
    public function insertPro($data)
    {
        $sql = "INSERT INTO products(name, img, price, idcate) VALUES (?,?,?,?)";
        $params = [$data['name'], $data['img'], $data['price'], $data['idcate']];
        return $this->db->insert($sql, $params);
    }
    public function delPro($id)
    {
        $sql = "DELETE FROM products WHERE id = " . $id;
        return $this->db->delPro($sql, [$id]);
    }
    public function updatePro($data)
    {
        $sql = "UPDATE products 
            SET name = :name, img = :img, price = :price, idcate = :idcate
            WHERE id = :id";
        $params = [
            ':name' => $data['name'],
            ':img' => $data['img'],
            ':price' => $data['price'],
            ':idcate' => $data['idcate'],
            ':id' => $data['id']
        ];
        return $this->db->insert($sql, $params);
    }
}
