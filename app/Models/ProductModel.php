<?php

class ProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBaseModel;
    }
    // hàm hiển thị chi tiết sản phẩm
    public function getDetail($id)
    {
        if ($id > 0) {
            $sql = "SELECT * FROM products WHERE id = $id";
            return $this->db->getOne($sql);
        } else {
            return null;
        }
    }
    // hàm để lấy id danh mục
    public function getIdCate($idpro)
    {
        $sql = "SELECT idcate FROM products WHERE id = $idpro";
        return $this->db->getOne($sql);
    }
    // hàm lấy sản phẩm đúng id danh mục và không hiển thị sản phẩm đã chọn
    public function getCatePro($idcate, $idpro)
    {
        $sql = "SELECT * FROM products WHERE idcate = $idcate AND id <> $idpro";
        return $this->db->getAll($sql);
    }
    // hàm hiển thị tất cả sản phẩm khi click vào danh mục
    public function getAllIdPro($kyw, $idcate, $bestdeal, $bestseller)
    {
        $sql = "SELECT * FROM products WHERE 1";
        if ($idcate > 0) {
            $sql .= " AND idcate = " . $idcate;
        }
        if ($bestdeal == 1) {
            $sql .= " AND bestdeal = " . 1;
        }
        if ($bestseller == 1) {
            $sql .= " AND bestseller = " . 1;
        }
        if ($kyw != "") {
            $sql .= " AND name LIKE '%$kyw%'";
        }
        $sql .= " ORDER BY id DESC";
        return $this->db->getAll($sql);
    }
}
