
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/reset-css@5.0.2/reset.css" />
    <link rel="stylesheet" href="../../css/user/overview.css" />
    <title>Sucré Bakery</title>
</head>

<?php
require_once __DIR__ . "/../../../api/core/core.php";

$productType = $api->get_product_types();

$defaultProductType = 1;
$pdt_id = $_GET["pdt_id"] ?? $defaultProductType;
$product = $api->get_products_by_type($pdt_id);
?>

<body>
    <img class="wallpaper" src="../../../public/img/wallpaper.jpg">
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
                        <button class="product-type" onclick="redirect(<?php echo $row["pdt_id"]; ?>)">
                            <?php echo $row["pdt_name"] ?>
                        </button>
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
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>

    <script>
        function redirect(pdt_id) {
            window.location.href = "?pdt_id=" + pdt_id;
        }
    </script>
</body>

</html>