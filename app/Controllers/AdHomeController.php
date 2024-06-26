<?php

class AdHomeController extends BaseController
{
    private $data;
    private $productList;
    private $category;
    private $users;
    function __construct()
    {
        $this->productList = new AdProductModel();
        $this->category = new AdCategoryModel();
        $this->users = new AdProductModel();
    }
    public function view()
    {
        $this->renderViewAdmin("home", $this->data);
    }
    public function addPro()
    {
        if (isset($_POST['addProduct']) && ($_POST['addProduct'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $bestdeal = isset($_POST['bestdeal']) ? 1 : 0;
            $bestseller = isset($_POST['bestseller']) ? 1 : 0;
            $idcate = $_POST['idcate'];
            $img = $_FILES['img']['name'];

            if ($name && $price && $idcate && $img) {
                $target_file = "../public/uploads/" . basename($img);
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

                $data = [
                    'name' => $name,
                    'img' => $img,
                    'price' => $price,
                    'bestdeal' => $bestdeal,
                    'bestseller' => $bestseller,
                    'idcate' => $idcate
                ];
                $this->productList->insertPro($data);
            } else {
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
        }
    }
    public function delPro()
    {
        if (isset($_GET['del']) && ($_GET['del']) > 0) {
            $del = $_GET['del'];
            $data = $this->productList->getIdPro($del);
            // var_dump($data);
            $target_file = "../public/uploads/" . $data['img'];
            unlink($target_file);
            $this->productList->delPro($del);
            header("Location: index.php?page=product");
        }
    }

    public function viewEditPro()
    {
        if (isset($_GET['edit']) && ($_GET['edit']) > 0) {
            $id = $_GET['edit'];
            $this->data['listcate'] = $this->category->getAllCate();
            $this->data['pro_detail'] = $this->productList->getIdPro($id);
            $this->renderViewAdmin("editPro", $this->data);
        }
    }
    public function editPro()
    {
        if (isset($_POST['editProduct']) && ($_POST['editProduct']) > 0) {
            $data = [];
            $data['id'] = $_POST['idpro'];
            $data['name'] = $_POST['name'];
            $data['price'] = $_POST['price'];
            $data['idcate'] = $_POST['idcate'];
            $data['bestdeal'] = isset($_POST['bestdeal']) ? 1 : 0;
            $data['bestseller'] = isset($_POST['bestseller']) ? 1 : 0;
            $data['img_old'] = $_POST['image_old'];

            if ($_FILES['img']['name'] != "") {
                $data['img'] = $_FILES['img']['name'];
                $target_file = "../public/uploads/" . $data['img'];
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

                // $file_old = "../public/uploads/" . $data['img_old'];
                // if (file_exists($file_old)) {
                //     unlink($file_old);
                // }

            } else {
                $data['img'] = $data['img_old'];
            }

            $this->productList->updatePro($data);
            echo '<script>location.href="index.php?page=product"</script>';
        }
    }

    public function products_get_all()
    {
        $this->data['products'] = $this->productList->getAll();
        $this->data['idcate'] = $this->category->getAllCate();
        $this->renderViewAdmin("products_list", $this->data);
    }

    public function users_get_all()
    {
        $this->data['users'] = $this->users->getAllUser();
        $this->renderViewAdmin("user", $this->data);
    }
}
