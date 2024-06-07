<?php

class AdHomeController extends BaseController
{
    private $data;
    private $productList;
    private $category;
    private $insertPro;
    private $users;
    function __construct()
    {
        $this->productList = new AdProductModel();
        $this->category = new AdProductModel();
        $this->insertPro = new AdProductModel();
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
            $idcate = $_POST['idcate'];
            $img = $_FILES['img']['name'];

            $target_file = "../public/uploads/" . basename($img);
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

            $data = [
                'name' => $name,
                'img' => $img,
                'price' => $price,
                'idcate' => $idcate
            ];
            $this->insertPro->insertPro($data);
        }
    }
    public function delPro()
    {
        if (isset($_GET['del']) && ($_GET['del']) > 0) {
            $id = $_GET['del'];
            $data = $this->productList->getIdPro($id);
            // var_dump($data);
            $target_file = "../public/uploads/" . $data['img'];
            unlink($target_file);
            $this->productList->delPro($id);
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
            $name = $_POST['name'];
            $price = $_POST['price'];
            $idcate = $_POST['idcate'];
            $img = $_FILES['img']['name'];
            $img_old = $_POST['image_old'];
            $id = $_POST['idcate'];
            if ($img != "") {
                $img = $img_old;
            } else {
                $target_file = "../public/uploads/" . basename($img);
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                // $file_old = "../public/uploads/" . $img_old;
                // unlink($file_old);
            }
        }
        $this->productList->updatePro($id, $name, $img, $price, $idcate);
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
    public function cate_get_all()
    {
        $this->data['categories'] = $this->category->getAllCate();
        $this->renderViewAdmin("cate_list", $this->data);
    }
}
