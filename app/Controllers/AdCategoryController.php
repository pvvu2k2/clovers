<?php

class AdCategoryController extends BaseController
{
    private $data;
    private $categories;
    function __construct()
    {
        $this->categories = new AdCategoryModel();
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
        if (isset($_GET['del']) && ($_GET['del'] > 0)) {
            $del = $_GET['del'];
            $data = $this->categories->getIdCate($del);
            $target_file = "../public/uploads/" . $data['img'];
            unlink($target_file);
            $this->categories->delCate($del);
            header("Location: index.php?page=category");
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
            echo '<script>location.href="index.php?page=category"</script>';
        }
    }
}