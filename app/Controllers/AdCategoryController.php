<?php

class AdCategoryController extends BaseController
{
    private $data;
    private $categories;
    private $product;
    function __construct()
    {
        $this->categories = new AdCategoryModel();
        $this->product = new ProductModel();
    }
    public function cate_get_all()
    {
        $this->data['categories'] = $this->categories->getAllCate();
        $this->renderViewAdmin("cate_list", $this->data);
    }
    public function addCate()
    {
        if (isset($_POST['addCate']) && ($_POST['addCate'] > 0)) {
            $name = $_POST['name'];
            $img = $_FILES['image']['name'];

            $target_file = "../public/uploads/" . basename($img);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

            $data = [
                'name' => $name,
                'image' => $img
            ];
            $this->categories->insertCate($data);
        }
    }
    public function delCate()
    {
        if (isset($_GET['del']) && ($_GET['del'] > 0) && (is_numeric($_GET['del']))) {
            $del = $_GET['del'];
            $products = $this->product->getAllIdPro("", $del, 0, 0);
            if (count($products) > 0) {
                echo '<script>alert("Không thể xóa danh mục vì có sản phẩm liên quan.")</script>';
            } else {
                $data = $this->categories->getIdCate($del);
                $target_file = "../public/uploads/" . $data['image'];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
                $this->categories->delCate($del);
            }
            echo '<script>window.location.href="index.php?page=category";</script>';
            exit();
        }
    }
    public function viewEditCate()
    {
        if (isset($_GET['edit']) && ($_GET['edit'] > 0)) {
            $edit = $_GET['edit'];
            $this->data['cate-detail'] = $this->categories->getIdCate($edit);
            $this->renderViewAdmin("editCate", $this->data);
        }
    }
    public function editCate()
    {
        if (isset($_POST['editCate']) && ($_POST['editCate'] > 0)) {
            $data = [];
            $data['id'] = $_POST['id'];
            $data['name'] = $_POST['name'];
            $data['image_old'] = $_POST['image_old'];

            if ($_FILES['image']['name'] != "") {
                $data['image'] = $_FILES['image']['name'];
                $target_file = "../public/uploads/" . $data['image'];
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

                // $file_old = "../public/uploads/" . $data['img_old'];
                // if (file_exists($file_old)) {
                //     unlink($file_old);
                // }

            } else {
                $data['image'] = $data['image_old'];
            }

            $this->categories->updateCate($data);
            echo '<script>location.href="index.php?page=category"</>';
        }
    }
}
