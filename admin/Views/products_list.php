<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Sản Phẩm</h2>
            <form action="index.php?page=product" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Tên sản phẩm">
                <input type="text" name="price" placeholder="Giá">
                <input type="file" name="img">
                <input type="checkbox" name="bestdeal">BestDeal
                <input type="checkbox" name="bestseller">BestSeller<br><br>
                <select name="idcate" id="idcate" style="padding: 10px; margin-bottom: 10px">
                    <option value="0">Chọn danh mục</option>
                    <?php
                    $cate = $data['idcate'];
                    foreach ($cate as $item) {
                        extract($item);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="addProduct" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách Sản Phẩm</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Bestdeal</th>
                        <th>Bestseller</th>
                        <th>Lượt xem</th>
                        <!-- <th>Lượt bán</th> -->
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = $data['products'];
                    $i = 1;
                    foreach ($products as $item) {
                        extract($item);
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><img src="../public/uploads/<?= $img ?>" width="80px"></td>
                        <td><?= $name ?></td>
                        <td>$<?= $price ?></td>
                        <td><?= $bestdeal ?></td>
                        <td><?= $bestseller ?></td>
                        <td><?= $view ?></td>
                        <td class="action-icons">
                            <a href="index.php?page=editPro&edit=<?= $id ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="index.php?page=product&del=<?= $id ?>"
                                onclick="return confirm('Bạn có chắc sẽ xóa sản phẩm?')">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>