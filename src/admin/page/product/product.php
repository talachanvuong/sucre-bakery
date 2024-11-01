<?php
global $api;

toast_session();

if (isset($_POST['deleteProduct'])) {
    $id = $_POST['productId'];

    $result = $api->remove_product($id);

    toast($result["message"]);
}

$totalPages = $api->get_total_pages();
$currentPage = $_GET["page"] ?? 1;
if ($currentPage < 1 || $currentPage > $totalPages) {
    $currentPage = 1;
}
$products = $api->get_products_by_page($currentPage);
?>

<div class="menu-main">
    <p class="title">Danh sách sản phẩm</p>

    <table class="table">
        <thead>
            <tr>
                <th class="col-1">Hình ảnh</th>
                <th class="col-2">Tên</th>
                <th class="col-3">Giá</th>
                <th class="col-4">Mô tả</th>
                <th class="col-5">Loại</th>
                <th class="col-6">Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td class="col-1">
                        <img class="product-image" src=<?php load_image($product["pd_image"]); ?>>
                    </td>

                    <td class="col-2"><?php echo $product['pd_name']; ?></td>

                    <td class="col-3"><?php convert_currency($product['pd_price']); ?></td>

                    <td class="col-4"><?php echo $product['pd_description']; ?></td>

                    <td class="col-5">
                        <?php
                        $productType = $api->get_product_type_by_id($product["pdt_id"]);
                        echo $productType["pdt_name"];
                        ?>
                    </td>

                    <td class="col-6">
                        <form action="?direct=edit_product" method="post">
                            <input type="hidden" name="productId" value="<?php echo $product['pd_id']; ?>">
                            <input class="edit-button" type="submit" value="Sửa">
                        </form>

                        <form method="post">
                            <input type="hidden" name="productId" value="<?php echo $product['pd_id']; ?>">
                            <input class="delete-button" type="submit" name="deleteProduct" value="Xoá">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="page-container">
        <p class="page-text">Trang</p>
        <form method="get">
            <input type="hidden" name="direct" value="product">
            <input class="page-input" type="number" min="1" max="<?= $totalPages ?>" onchange="this.form.submit()" name="page"
                value="<?= $currentPage ?>">
        </form>
        <p class="page-text">/</p>
        <p class="page-text"><?= $totalPages ?></p>
    </div>
</div>