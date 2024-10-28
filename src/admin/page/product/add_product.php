<?php
global $api;

if (isset($_POST['addProduct'])) {
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $description = $_POST['productDescription'];
    $type = $_POST['productType'];
    $image = $_FILES['productImage']['tmp_name'];

    $result = $api->add_product($name, $price, $description, $type, $image);

    toast($result["message"]);
}

$productTypes = $api->get_product_types();
?>

<div class="menu-main">
    <p class="title">Thêm sản phẩm</p>

    <form class="form" method="post" enctype="multipart/form-data">
        <div class="group">
            <p class="label">Tên sản phẩm:</p>
            <input class="input" type="text" name="productName" required>
        </div>

        <div class="group">
            <p class="label">Giá:</p>
            <input class="input" type="number" min="0" step="1000" name="productPrice" required>
        </div>

        <div class="group">
            <p class="label">Mô tả:</p>
            <textarea class="input" name="productDescription" rows="5" required></textarea>
        </div>

        <div class="group">
            <p class="label">Loại:</p>
            <select class="input" name="productType">
                <?php
                foreach ($productTypes as $productType) { ?>
                    <option value="<?php echo $productType["pdt_id"]; ?>"><?php echo $productType["pdt_name"]; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="group">
            <p class="label">Hình ảnh:</p>
            <input class="input" type="file" name="productImage" required>
        </div>

        <input class="submit" type="submit" name="addProduct" value="Thêm"></input>
    </form>
</div>