    <section class="home">

        <h1 class="text-most"><a href="index.php?page=allpro&bestdeal=1">Best Deals</a></h1>
        <section class="lists">
            <section class="product-list">
                <?php
                $bestdeals = $data['bestdeals'];
                foreach ($bestdeals as $item) {
                    extract($item);
                    $priceSale = $price * 0.9;
                    echo '
                            <section class="product">
                                <a href="index.php?page=detail&id=' . $id . '"><img src="./public/uploads/' . $img . '"></a>
                                <p class="text-tick">Best Deals</p>
                                <div>
                                    <p class="name">' . $name . '</p>
                                    <p class="price"><span style="margin-right:20px; text-decoration: line-through;">$' . $price . '</span> $' . $priceSale . '</p>
                                </div>
                                <a href="#" class="btn_addToCart">Add to Cart</a>
                            </section>
                        ';
                } ?>
            </section>
        </section>

        <h1 class="text-most">Most Popular Categories</h1>
        <section class="category-carousel">
            <button id="prevBtn">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <section class="categories-wrapper">
                <section class="category-list">
                    <?php
                    $category = $data['category'];
                    foreach ($category as $item) {
                        extract($item);
                        echo '
                            <section class="category">
                                <a href="index.php?page=allpro&idcate=' . $id . '">
                                    <img src="./public/uploads/' . $image . '">
                                </a>
                                <p>' . $name . '</p>
                            </section>
                        ';
                    } ?>
                </section>
            </section>
            <button id="nextBtn">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </section>



        <h1 class="text-most">Best Seller</h1>
        <section class="lists">
            <section class="product-list">
                <?php
                $bestSeller = $data['bestseller'];
                foreach ($bestSeller as $item) {
                    extract($item);
                    echo '
                    <section class="product">
                        <a href="index.php?page=detail&id=' . $id . '"><img src="./public/uploads/' . $img . '"></a>
                        <p class="text-tick">Most Popular</p>
                        <div>
                            <p class="name">' . $name . '</p>
                            <p class="price"><span>$</span>' . $price . '</p>
                        </div>
                        <a href="#" class="btn_addToCart">Add to Cart</a>
                    </section>
                    ';
                } ?>
            </section>
        </section>


        <h1 class="text-most">The Most Search</h1>
        <section class="lists">
            <section class="product-list">
                <?php
                $mostSearch = $data['mostsearch'];
                $bestSeller = $data['bestseller'];
                $bestDeals = $data['bestdeals'];

                foreach ($mostSearch as $mostsearch) {
                    $is_bestseller = false;
                    $is_bestdeal = false;
                    $html = "";

                    foreach ($bestSeller as $bestseller) {
                        if ($bestseller['id'] == $mostsearch['id']) {
                            $is_bestseller = true;
                            break;
                        }
                    }

                    foreach ($bestDeals as $bestdeals) {
                        if ($bestdeals['id'] == $mostsearch['id']) {
                            $is_bestdeal = true;
                            break;
                        }
                    }

                    // var_dump($mostsearch['id'], $is_bestseller, $is_bestdeal);

                    if ($is_bestseller) {
                        $html = '<p class="text-tick">Most Popular</p>';
                    } else if ($is_bestdeal) {
                        $html = '<p class="text-tick">Best Deals</p>';
                    } else {
                        $html = '';
                    }

                    extract($mostsearch);
                    $priceSale = $price * 0.9;
                ?>
                <section class="product">
                    <a href="index.php?page=detail&id=<?= $id ?>"><img src="./public/uploads/<?= $img ?>"></a>
                    <?php echo $html; ?>
                    <div>
                        <p class="name"><?= $name ?></p>
                        <p class="price"><span>$</span><?= $price ?></p>
                    </div>
                    <a href="#" class="btn_addToCart">Add to Cart</a>
                </section>
                <?php } ?>

            </section>
        </section