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