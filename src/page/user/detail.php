<?php
require __DIR__ . "/../../../api/core/core.php";

$pd_id = $_GET["pd_id"];
$product = $api->get_product_by_id($pd_id);
?>

<div class="layoutContainer">
    <div class="menu">
        <div class="menu-left">
            <img class="product-image" src=<?php load_image($product["pd_image"]); ?>>
        </div>
        <div class="menu-main">
            <p class="product-name"><?php echo $product["pd_name"] ?></p>
            <p class="product-price"><?php echo $product["pd_price"] ?></p>
            <p class="product-price"><?php echo $product["pd_description"] ?></p>
            <!-- <form method="get">
                    <input type="hidden" name="direct" value="detail">
                    <input type="hidden" name="pd_id" value="<?php echo $row["pd_id"] ?>">
                    <input class="product-type" type="submit" value="Xem sản phẩm">
                </form> -->
        </div>
    </div>
</div>