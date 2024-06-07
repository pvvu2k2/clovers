<?php

class HomeController extends BaseController
{
    private $data;
    private $category;
    private $products;
    function __construct()
    {
        // hiển thị các danh mục
        $this->category = new CategoryModel();
        // hiển thị tất cả sản phẩm
        $this->products = new HomeModel();
    }
    public function header()
    {
        $this->data['categories'] = $this->category->getAllCate();
        $this->renderView("header", $this->data);
    }
    public function view()
    {
        $this->data['category'] = $this->category->getAllCate();
        $this->data['bestseller'] = $this->products->getBestSeller();
        $this->data['bestdeals'] = $this->products->getBestDeals();
        $this->data['mostsearch'] = $this->products->getMostSearch();
        $this->renderView("home", $this->data);
    }
}
