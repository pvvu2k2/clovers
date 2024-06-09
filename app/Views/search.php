<section class="all-id-pro">
    <section class="lists">
        <?php
        if (!empty($data['pro-search'])) {
            $search = $data['pro-search'];

            foreach ($search as $item) {
                extract($item);
                $priceSale = $price * 0.9;
        ?>

                <section class="product">
                    <a href="index.php?page=detail&id=<?= $id ?>"><img src="./public/uploads/<?= $img ?>"></a>
                    <div>
                        <p class="name"><?= $name ?></p>
                        <p class="price"><span style="margin-right:20px; text-decoration: line-through;">$<?= $price ?></span>
                            $<?= $priceSale ?></p>
                    </div>
                    <a href="#" class="btn_addToCart">Add to Cart</a>
                </section>

            <?php }
        } else { ?>
            <p>Không tìm thấy sản phẩm!</p>
        <?php } ?>
    </section>
</section>