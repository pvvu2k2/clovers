<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Danh Mục</h2>
            <form action="index.php?page=category" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Tên danh mục">
                <input type="file" name="image">
                <input type="submit" name="addCate" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách Danh Mục</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $categories = $data['categories'];
                    $i = 1;
                    foreach ($categories as $item) {
                        echo '<tr>
                              <td>' . $i++ . '</td>
                              <td><img src="../public/uploads/' . $item['image'] . '" width="80px"></td>
                              <td>' . $item['name'] . '</td>
                              <td class="action-icons">
                                 <a href="index.php?page=editCate&edit=' . $item['id'] . '">Edit</a>
                                 <a href="index.php?page=category&del=' . $item['id'] . '">Delete</a>
                              </td>
                           </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>