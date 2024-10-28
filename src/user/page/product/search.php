<?php
global $api;
$showResult = false;
$keyword = "";

if (isset($_GET["keyword"])) {
    $showResult = true;
    $keyword = $_GET["keyword"];
}
?>

<div class="layout-container">
    <form class="search-form" method="get">
        <input type="hidden" name="direct" value="search">
        <label class="search-label" for="keyword">Từ khoá:</label>
        <input class="search-input" type="text" name="keyword" value="<?php echo $keyword; ?>">
        <input class="search-submit" type="submit" value="Tìm kiếm">
    </form>

    <?php
    if ($showResult) {
        $products = $api->get_products_by_keyword($keyword);

        if (empty($products)) { ?>
            <p class="no-product">Không có dữ liệu</p>
        <?php } else { ?>
            <div class="search-result">
                <?php foreach ($products as $product) { ?>
                    <div class="product-item">
                        <img class="product-image" src=<?php load_image($product["pd_image"]); ?>>
                        <p class="product-name" title="<?php echo $product["pd_name"]; ?>"><?php echo $product["pd_name"]; ?></p>
                        <p class="product-price"><?php convert_currency($product["pd_price"]); ?></p>
                        <a class="product-button" href="?direct=detail&pd_id=<?php echo $product["pd_id"]; ?>">Xem sản phẩm</a>
                    </div>
                <?php } ?>
            </div>
        <?php }
    } ?>
</div>