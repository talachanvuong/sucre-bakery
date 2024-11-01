<?php
global $api;

$pd_id = $_POST["productId"];
$product = $api->get_product_by_id($pd_id);
$productTypes = $api->get_product_types();

$pd_name = $product["pd_name"];
$pd_price = $product["pd_price"];
$pd_description = $product["pd_description"];
$pdt_id = $product["pdt_id"];
$pd_image = $product["pd_image"];

if (isset($_POST['editProduct'])) {
    $new_name = $_POST["productName"];
    $new_price = $_POST["productPrice"];
    $new_description = $_POST["productDescription"];
    $new_type = $_POST["productType"];
    $new_image = $_FILES["productImage"]["tmp_name"];

    $new_product = [];

    if ($new_name !== $pd_name) {
        $new_product["pd_name"] = $new_name;
    }

    if ($new_description !== $pd_description) {
        $new_product["pd_description"] = $new_description;
    }

    if ($new_type !== $pdt_id) {
        $new_product["pdt_id"] = $new_type;
    }

    // Need to handle this, show old image, if new image !== old image update
    // $new_product["pd_image"] = $new_image;

    $result = $api->edit_product($pd_id, $new_product);

    if ($result["success"]) {
        set_toast_message($result["message"]);
        header("location:?direct=product");
        exit();
    } else {
        toast($result["message"]);
    }
}
?>

<div class="menu-main">
    <p class="title">Sửa sản phẩm</p>

    <form class="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="productId" value="<?php echo $product['pd_id']; ?>">

        <div class="group">
            <p class="label">Tên sản phẩm:</p>
            <input class="input" type="text" name="productName" value="<?php echo $product["pd_name"]; ?>">
        </div>

        <div class="group">
            <p class="label">Giá:</p>
            <input class="input" type="number" min="0" step="1000" name="productPrice"
                value="<?php echo $product["pd_price"]; ?>">
        </div>

        <div class="group">
            <p class="label">Mô tả:</p>
            <textarea class="input" name="productDescription"
                rows="5"><?php echo $product["pd_description"]; ?></textarea>
        </div>

        <div class="group">
            <p class="label">Loại:</p>
            <select class="input" name="productType">
                <?php
                foreach ($productTypes as $productType) {
                    if ($product["pdt_id"] === $productType["pdt_id"]) { ?>
                        <option value="<?php echo $productType["pdt_id"]; ?>" selected><?php echo $productType["pdt_name"]; ?>
                        </option>
                    <?php } else { ?>
                        <option value="<?php echo $productType["pdt_id"]; ?>"><?php echo $productType["pdt_name"]; ?>
                        </option>
                    <?php }
                } ?>
            </select>
        </div>

        <div class="group">
            <p class="label">Hình ảnh:</p>
            <input class="input" type="file" name="productImage">
        </div>

        <input class="submit" type="submit" name="editProduct" value="Sửa"></input>
    </form>
</div>