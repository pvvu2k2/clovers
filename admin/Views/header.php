<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Thêm thư viện Chart.js từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <h1>Trang Quản Trị</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Trang Chủ</a></li>
            <li><a href="index.php?page=product">Sản phẩm</a></li>
            <li><a href="index.php?page=users">Người dùng</a></li>
            <li><a href="index.php?page=category">Danh mục</a></li>
            <li>


                <?php

                if (isset($_SESSION['user'])) {
                    echo '
                            <a href="#" style="font-size: 20px; margin-right: 5px">' . $_SESSION['user']['username'] . '</a>
                            <a href="index.php?page=logout" style="font-size: 20px">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        ';
                }

                ?>
            </li>
        </ul>
    </nav>