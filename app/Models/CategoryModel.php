<?php

class CategoryModel
{
    private $db;
    function __construct()
    {
        $this->db = new DataBaseModel;
    }
    // hàm lấy tất cả danh mục
    public function getAllCate()
    {
        $sql = "SELECT * FROM category ORDER BY name";
        return $this->db->getAll($sql);
    }
}
