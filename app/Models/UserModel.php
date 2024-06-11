<?php

class UserModel
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
    public function createUser($data)
    {
        $sql = "INSERT INTO user(username, password, name, address, email, phone) VALUES (?,?,?,?,?,?)";
        $params = [$data['username'], $data['password'], $data['name'], $data['address'], $data['email'], $data['phone']];
        return $this->db->insert($sql, $params);
    }
    public function checkUser($data)
    {
        extract($data);
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        return $this->db->getOne($sql);
    }


    // public function delPro($id)
    // {
    //     $sql = "DELETE FROM products WHERE id = " . $id;
    //     return $this->db->del($sql, [$id]);
    // }
    // public function updatePro($data)
    // {
    //     $sql = "UPDATE products 
    //         SET name = :name, img = :img, price = :price, bestdeal = :bestdeal, bestseller = :bestseller ,idcate = :idcate
    //         WHERE id = :id";
    //     $params = [
    //         ':name' => $data['name'],
    //         ':img' => $data['img'],
    //         ':price' => $data['price'],
    //         ':bestdeal' => $data['bestdeal'],
    //         ':bestseller' => $data['bestseller'],
    //         ':idcate' => $data['idcate'],
    //         ':id' => $data['id']
    //     ];
    //     return $this->db->insert($sql, $params);
    // }
}