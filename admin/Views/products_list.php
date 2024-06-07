<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Sản Phẩm</h2>
            <form action="index.php?page=product" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Tên sản phẩm">
                <input type="text" name="price" placeholder="Giá">
                <input type="file" name="img">
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
                        <th>Lượt xem</th>
                        <th>Lượt bán</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = $data['products'];
                    $i = 1;
                    foreach ($products as $item) {
                        echo '<tr>
                              <td>' . $i++ . '</td>
                              <td><img src="../public/uploads/' . $item['img'] . '" width="80px"></td>
                              <td>' . $item['name'] . '</td>
                              <td>$' . $item['price'] . '</td>
                              <td>' . $item['view'] . '</td>
                              <td>10</td>
                              <td class="action-icons">
                                 <a href="index.php?page=editPro&edit=' . $item['id'] . '">Edit</a>
                                 <a href="index.php?page=product&del=' . $item['id'] . '">Delete</a>
                              </td>
                           </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>