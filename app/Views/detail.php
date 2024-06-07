<section class="detail">
    <section class="list_detail">
        <?php
        $detail = $data['detail'];
        echo '
            <div class="item_detail">
                <div class="image_detail">
                    <img src="public/uploads/' . $detail['img'] . '" alt="' . $detail['name'] . '" />
                </div>
                <div>
                    <h2>' . $detail['name'] . '</h2>
                    <p class="price"><span>$</span> ' . $detail['price'] . '</p>
                    <p style="margin-bottom: 36px">Lượt xem: ' . $detail['view'] . '</p>
                    <a href="#" class="btn_red">Add to Cart</a>
                </div>
            </div>
            ';
        ?>
    </section>

    <section class="related-products">
        <?php
        $product_cate = $data['product_cate'];
        foreach ($product_cate as $item) {
            extract($item);
            echo '
                <section>
                    <div class="image_detail">
                        <a href="index.php?page=detail&id=' . $id . '">
                            <img src="./public/uploads/' . $img . '">
                        </a>
                    </div>
                    <div>
                        <h3 style="height: 54px">' . $name . '</h3>
                        <p class="price"><span>$</span>' . $price . '</p>
                        <p style="margin-bottom: 36px">Lượt xem: ' . $view . '</p>
                        <a href="#" class="btn_red">Add to Cart</a>
                    </div>
                </section>
                ';
        }
        ?>

    </section>
</section>