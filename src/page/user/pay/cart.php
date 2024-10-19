<?php
require __DIR__ . "/../../../../api/core/core.php";

if (isset($_POST["action"])) {
    $pd_id = $_POST["pd_id"];

    switch ($_POST["action"]) {
        case "update":
            $ca_quantity = $_POST["ca_quantity"];
            $api->update_cart_product_quantity(1, $pd_id, $ca_quantity);
            break;

        case "remove":
            $api->remove_cart_product(1, $pd_id);
            break;

        case "add":
            if ($api->exist_cart_product(1, $pd_id)) {
                $product = $api->get_cart_product_by_pd_id(1, $pd_id);
                $api->update_cart_product_quantity(1, $pd_id, $product["ca_quantity"] + 1);
            } else {
                $api->add_cart_product(1, $pd_id);
            }
            break;
    }
}

$cart = $api->get_cart_products_by_us_id(1);
$total = 0;
?>

<div class="layout-container">
    <?php
    if (empty($cart)) { ?>
        <p class="no-product">Bạn chưa thêm gì vào giỏ hàng!</p>
    <?php } else { ?>
        <div class="cart-container">
            <p class="cart-title">Giỏ hàng</p>

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                        <th>Xoá</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($cart as $product) {
                        $total += $product["pd_price"] * $product["ca_quantity"]; ?>

                        <tr>
                            <td><?php echo $product["pd_name"]; ?></td>
                            <td><?php echo convert_currency($product["pd_price"]); ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="pd_id" value="<?php echo $product["pd_id"]; ?>">
                                    <input type="number" min="1" max="10" onchange="this.form.submit()" name="ca_quantity"
                                        value="<?php echo $product["ca_quantity"]; ?>">
                                </form>
                            </td>
                            <td><?php echo convert_currency($product["pd_price"] * $product["ca_quantity"]); ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="pd_id" value="<?php echo $product["pd_id"]; ?>">
                                    <input class="delete-btn" type="submit" value="Xoá">
                                </form>
                            </td>
                        <tr>
                        <?php } ?>
                </tbody>
            </table>

            <div class="cart-seperate">
                <div class="cart-note">
                    <label for="note">Ghi chú:</label>
                    <textarea id="note" rows="2" placeholer="nhập ghi chú của bạn..."></textarea>
                </div>

                <div class="cart-total-container">
                    <p class="cart-total-title">Thành tiền:</p>
                    <p class="cart-total"><?php echo convert_currency($total); ?></p>
                </div>
            </div>
        </div>

        <form class="checkout-form" method="post">
            <input type="hidden" name="direct" value="checkout">
            <input class="checkout-btn" type="submit" value="Thanh toán">
        </form>
    <?php } ?>
</div>