<?php
require __DIR__ . "/../../../../api/core/core.php";

$pd_id = $_GET["pd_id"];
$product = $api->get_product_by_id($pd_id);
$productType = $api->get_product_type_by_id((int) $product["pdt_id"]);
?>

<div class="layout-container">
    <div class="menu">
        <div class="menu-left">
            <img class="product-image" src=<?php load_image($product["pd_image"]); ?>>
        </div>
        <div class="menu-main">
            <p class="product-name"><?php echo $product["pd_name"]; ?></p>
            <p class="product-price"><?php echo convert_currency($product["pd_price"]); ?></p>
            <hr>
            <p class="title">Loại sản phẩm:</p>
            <p class="paragraph"><?php echo $productType["pdt_name"]; ?></p>
            <hr>
            <p class="title">Mô tả:</p>
            <p class="paragraph"><?php echo $product["pd_description"]; ?></p>
            
            <form class="form" method="post">
                <input type="hidden" name="direct" value="cart">
                <input type="hidden" name="pd_id" value="<?php echo $product["pd_id"] ?>">
                <input class="add-to-cart" type="submit" value="Thêm vào giỏ hàng 🛒">
            </form>
        </div>
    </div>
</div>