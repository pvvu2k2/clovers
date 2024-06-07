<h2>Chỉnh sửa Sản Phẩm</h2>
<form action="index.php?page=product" method="post" enctype="multipart/form-data">
    <select name="idcate" id="idcate" style="padding: 10px; margin-bottom: 10px">
        <?php
        $listcate = $data['listcate'];
        $pro_detail = $data['pro_detail'];
        foreach ($listcate as $item) {
            extract($item);
            if ($id == $pro_detail['idcate']) {
                echo '<option value="' . $id . '" selected>' . $name . '</option>';
            } else {
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
        }
        ?>
    </select>
    <input type="text" name="name" value="<?= $pro_detail['name'] ?>" placeholder="Tên sản phẩm">
    <input type="text" name="price" value="<?= $pro_detail['price'] ?>" placeholder="Giá">
    <input type="file" name="img">
    <img src="../public/uploads/<?= $pro_detail['img'] ?>">
    <input type="hidden" name="image_old" value="<?= $pro_detail['img'] ?>">
    <input type="hidden" name="idcate" value="<?= $pro_detail['id'] ?>">
    <input type="submit" name="editProduct" value="Sửa">
</form>