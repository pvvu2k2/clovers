<?php

class HomeModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBaseModel;
    }
    // hàm hiển thị 5 sản phẩm bán chạy
    public function getBestSeller()
    {
        $sql = "SELECT * FROM products WHERE bestseller = '1' ORDER BY name ";
        return $this->db->getAll($sql);
    }
    // hàm hiển thị 5 sản phẩm sales
    public function getBestDeals()
    {
        $sql = "SELECT * FROM products WHERE bestdeal = '1' ORDER BY name ";
        return $this->db->getAll($sql);
    }

    // hàm hiển thị sản phẩm được quan tâm và tìm kiếm
    public function getMostSearch()
    {
        $sql = "SELECT * FROM products ORDER BY view DESC, name LIMIT 5 ";
        return $this->db->getAll($sql);
    }
}
