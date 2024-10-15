<?php
require __DIR__ . "/../../../api/core/core.php";

$productType = $api->get_product_types();

$defaultProductType = 1;
$pdt_id = $_GET["pdt_id"] ?? $defaultProductType;
$product = $api->get_products_by_type($pdt_id);
?>

<div class="layoutContainer">
    <div class="menu">
        <div class="menu-left">
            <?php
            if (count($productType) == 0) {
                ?>
                <p>Không có dữ liệu</p>
            <?php } else {
                foreach ($productType as $row) {
                    ?>
                    <form method="get">
                        <input type="hidden" name="direct" value="product">
                        <input type="hidden" name="pdt_id" value="<?php echo $row["pdt_id"]; ?>">
                        <input class="product-type" type="submit" value="<?php echo $row["pdt_name"] ?>">
                    </form>
                <?php }
            } ?>
        </div>

        <div class="menu-main">
            <?php
            if (count($product) == 0) {
                ?>
                <p>Không có dữ liệu</p>
            <?php } else {
                foreach ($product as $row) {
                    ?>
                    <div class="product-item">
                        <img class="product-image" src=<?php load_image($row["pd_image"]); ?>>
                        <p class="product-name"><?php echo $row["pd_name"] ?></p>
                        <p class="product-price"><?php echo $row["pd_price"] ?></p>
                        <form method="get">
                            <input type="hidden" name="direct" value="detail">
                            <input type="hidden" name="pd_id" value="<?php echo $row["pd_id"] ?>">
                            <input class="product-type" type="submit" value="Xem sản phẩm">
                        </form>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>