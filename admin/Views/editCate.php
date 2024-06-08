<h2>Chỉnh sửa Danh Mục</h2>
<?php
$cate_detail = $data['cate-detail'];
var_dump($cate_detail);
?>
<form action="index.php?page=category" method="post" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $cate_detail['name'] ?>" placeholder="Tên sản phẩm">
    <input type="file" name="image">
    <img src="../public/uploads/<?= $cate_detail['image'] ?>">
    <input type="hidden" name="image_old" value="<?= $cate_detail['image'] ?>">
    <input type="hidden" name="id" value="<?= $cate_detail['id'] ?>">
    <input type="submit" name="editCate" value="Sửa">
</form>