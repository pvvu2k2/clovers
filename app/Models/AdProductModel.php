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
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
        return $this->db->getAll($sql);
    }
    public function getIdPro($id)
    {
        $sql = "SELECT * FROM products WHERE id = " . $id;
        return $this->db->getOne($sql);
    }
    public function insertPro($data)
    {
        $sql = "INSERT INTO products(name, img, price, bestdeal, bestseller, idcate) VALUES (?,?,?,?,?,?)";
        $params = [$data['name'], $data['img'], $data['price'], $data['bestdeal'], $data['bestseller'], $data['idcate']];
        return $this->db->insert($sql, $params);
    }
    public function delPro($id)
    {
        $sql = "DELETE FROM products WHERE id = " . $id;
        return $this->db->del($sql, [$id]);
    }
    public function updatePro($data)
    {
        $sql = "UPDATE products 
            SET name = :name, img = :img, price = :price, bestdeal = :bestdeal, bestseller = :bestseller ,idcate = :idcate
            WHERE id = :id";
        $params = [
            ':name' => $data['name'],
            ':img' => $data['img'],
            ':price' => $data['price'],
            ':bestdeal' => $data['bestdeal'],
            ':bestseller' => $data['bestseller'],
            ':idcate' => $data['idcate'],
            ':id' => $data['id']
        ];
        return $this->db->insert($sql, $params);
    }
}
