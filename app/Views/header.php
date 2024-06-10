<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/main.css">

</head>

<body>

    <header>
        <a href="index.php">Clovers.</a>
        <form action="index.php?page=search" method="post">
            <input type="text" name="text-search" placeholder="Search">
            <input type="submit" name="btn-search" value="&#x1F50D;">
        </form>
        <div>
            <a href="#">
                <i class="fa-solid fa-heart"></i>
            </a>

            <?php
            if (isset($_SESSION['user'])) {
                echo '
                        <a href="#" style="font-size: 20px; margin-right: 5px">' . $_SESSION['user']['username'] . '</a>
                        <a href="index.php?page=logout" style="font-size: 20px">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    ';
            } else {
                echo '
                    <a href="index.php?page=login">
                        <i class="fa-solid fa-circle-user"></i>
                    </a>
                ';
            }
            ?>


            <a href="#">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.php?page=allpro&beastdeal=1">Deals</a>
            </li>

            <?php

            $categories = $data['categories'];

            shuffle($categories);

            $categories = array_slice($categories, 0, 3);

            foreach ($categories as $category) {
                extract($category);
                echo '<li><a href="index.php?page=allpro&idcate=' . $id . '">' . $name . '</a></li>';
            }

            ?>

            <li>
                <a href="index.php?page=allpro&bestseller=1">Most Popular</a>
            </li>

        </ul>
    </nav>
    <div id="container">
        <main>