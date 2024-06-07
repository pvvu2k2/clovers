<?php

class ProductController extends BaseController
{
    private $data;
    private $detail;
    private $products;
    private $category;
    private $bestpro;

    function __construct()
    {
        $this->detail = new ProductModel();
        $this->products = new ProductModel();
        $this->category = new CategoryModel();
        $this->bestpro = new HomeModel();
    }
    public function __getDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        $result = $this->detail->getIdCate($id);
        $this->data['product_cate'] = $this->detail->getCatePro($result['idcate'], $id);
        if (is_array($this->detail->getDetail($id))) {
            $this->data['detail'] = $this->detail->getDetail($id);
            $this->renderView("detail", $this->data);
        } else {
            echo "Không có dữ liệu";
        }
    }
    public function get_all_pro_cate()
    {
        if (isset($_GET['idcate']) && ($_GET['idcate'] > 0)  && (is_numeric($_GET['idcate']))) {
            $idcate = $_GET['idcate'];
        } else {
            $idcate = 0;
        }

        if (isset($_GET['bestdeal']) && ($_GET['bestdeal'] == 1) && (is_numeric($_GET['bestdeal']))) {
            $bestdeal = $_GET['bestdeal'];
        } else {
            $bestdeal = 0;
        }

        if (isset($_GET['bestseller']) && ($_GET['bestseller'] == 1)  && (is_numeric($_GET['bestseller']))) {
            $bestseller = $_GET['bestseller'];
        } else {
            $bestseller = 0;
        }

        if (isset($_POST['text-search']) && ($_POST['text-search'] != '')) {
            $kyw = $_POST['text-search'];
        } else {
            $kyw = "";
        }

        $this->data['cate'] = $this->category->getAllCate();
        $this->data['bestseller'] = $this->bestpro->getBestSeller();
        $this->data['bestdeals'] = $this->bestpro->getBestDeals();
        $this->data['allidpro'] = $this->products->getAllIdPro($kyw, $idcate, $bestdeal, $bestseller);
        $this->renderView("allpro", $this->data);
    }
    public function searchPro()
    {
        if (isset($_POST['btn-search'])) {
            $name = $_POST['text-search'];
            if (!empty($name)) { // Kiểm tra nếu $name không rỗng
                $this->data['pro-search'] = $this->products->getAllIdPro($name, 0, 0, 0);
                if ($this->data['pro-search'] !== false) {
                    $this->renderView("search", $this->data);
                } else {
                    echo "Không tìm thấy sản phẩm!";
                }
            } else {
                echo "Vui lòng nhập tên sản phẩm!";
            }
        }
    }
}
