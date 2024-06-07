<section class="all-id-pro">

    <section class="filter">
        <p>Filter by</p>
        <section>
            <ul>
                <li class="nav-filter">
                    <ul id="subnav-filter">
                        <li>
                            <a href="index.php?page=allpro">All</a>
                        </li>
                        <li>
                            <a href="index.php?page=allpro&bestdeal=1">Deals</a>
                        </li>
                        <li>
                            <a href="index.php?page=allpro&bestseller=1">Most Popular</a>
                        </li>

                        <?php

                        $cate = $data['cate'];
                        foreach ($cate as $item) {
                            extract($item);
                            echo '<li><a href="index.php?page=allpro&idcate=' . $id . '">' . $name . '</a></li>';
                        }

                        ?>

                    </ul>
                </li>

            </ul>
        </section>
    </section>

    <section class="lists">

        <?php
        $allIdPro = $data['allidpro'];
        $bestSeller = $data['bestseller'];
        $bestDeals = $data['bestdeals'];

        foreach ($allIdPro as $allidpro) {
            $is_bestseller = false;
            $is_bestdeal = false;
            $html = "";

            foreach ($bestSeller as $bestseller) {
                if ($bestseller['id'] == $allidpro['id']) {
                    $is_bestseller = true;
                    break;
                }
            }

            foreach ($bestDeals as $bestdeals) {
                if ($bestdeals['id'] == $allidpro['id']) {
                    $is_bestdeal = true;
                    break;
                }
            }

            // var_dump($allidpro['id'], $is_bestseller, $is_bestdeal);

            if ($is_bestseller) {
                $html = '<p class="text-tick">Most Popular</p>';
            } else if ($is_bestdeal) {
                $html = '<p class="text-tick">Best Deals</p>';
            } else {
                $html = '';
            }

            extract($allidpro);
            $priceSale = $price * 0.9;

        ?>

            <section>
                <a href="index.php?page=detail&id=<?= $id ?>"><img src="./public/uploads/<?= $img ?>"></a>
                <?php echo $html; ?>
                <div>
                    <p class="name"><?= $name ?></p>
                    <?php
                    if ($is_bestdeal) { ?>
                        <p class="price"><span style="margin-right:20px; text-decoration: line-through;">$<?= $price ?></span>
                            $<?= $priceSale ?></p>
                    <?php } else { ?>
                        <p class="price">$<?= $price ?></p>
                    <?php } ?>

                </div>
                <a href="#" class="btn_addToCart">Add to Cart</a>
            </section>

        <?php } ?>

    </section>

</section>