<section class="detail">
    <section class="list_detail">
        <?php
        if (!empty($data['pro-search'])) {
            $search = $data['pro-search'];
            foreach ($search as $item) {
                extract($item);
                echo '
                    <div class="item_detail">
                        <div class="image_detail">
                            <img src="public/uploads/' . $img . '" alt="' . $name . '" />
                        </div>
                        <div>
                            <h2>' . $name . '</h2>
                            <p class="price"><span>$</span> ' . $price . '</p>
                            <p style="margin-bottom: 36px">Lượt xem: ' . $view . '</p>
                            <a href="#" class="btn_red">Add to Cart</a>
                        </div>
                    </div>
                    ';
            }
        } else {
            echo 'Không tìm thấy sản phẩm!';
        }
        ?>
    </section>
</section>