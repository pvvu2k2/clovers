<?php

session_start();
ob_start();

require_once "../app/Models/MainModel.php";
require_once "../app/Controllers/MainController.php";

require_once "./Views/header.php";

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case "product":
            $products = new AdHomeController();
            $products->addPro();
            $products->delPro();
            $products->editPro();
            $products->products_get_all();
            break;
        case "editPro":
            $products = new AdHomeController();
            $products->viewEditPro();
            break;
        case "users":
            $users = new AdHomeController();
            $users->users_get_all();
            break;
        case "category":
            $categories = new AdCategoryController();
            $categories->addCate();
            $categories->delCate();
            $categories->editCate();
            $categories->cate_get_all();
            break;
        case "editCate":
            $categories = new AdCategoryController();
            $categories->viewEditCate();
            break;
        case "logout":
            $user = new UserController();
            $user->logoutAdmin();
            break;
        default:
            $home = new AdHomeController();
            $home->view();
            break;
    }
} else {
    $home = new AdHomeController();
    $home->view();
}


require_once "./Views/footer.php";
