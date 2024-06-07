<?php

require_once "./app/Controllers/MainController.php";
require_once "./app/Models/MainModel.php";

// require_once "./app/Views/header.php";
$header = new HomeController();
$header->header();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case "detail":
            $detail = new ProductController();
            $detail->__getDetail();
            break;
        case "allpro":
            $products = new ProductController();
            $products->get_all_pro_cate();
            break;
        case "search":
            $search = new ProductController();
            $search->searchPro();
            break;
        default:
            $home = new HomeController();
            $home->view();
            break;
    }
} else {
    $home = new HomeController();
    $home->view();
}

require_once "./app/Views/footer.php";
