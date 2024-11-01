<?php
global $api;

toast_session();

$us_info = $api->get_user_info();
$us_id = $us_info["us_id"];

$cart = $api->get_cart_products($us_id);
$total = 0;
?>

<div class="layout-container">
    <div class="payout-container">
        <p class="title">Thông tin thanh toán</p>

        <form action="" method="post">

            <div class="horizontal-container">
                <div class="choice">
                    <input type="radio" name="shipping_info" checked>
                    <p>Sử dụng thông tin mặc định</p>
                </div>

                <div class="choice">
                    <input type="radio" name="shipping_info">
                    <p>Điền mới</p>
                </div>
            </div>

            <div class="input-group">
                <p>Họ và tên:</p>
                <input type="text" name="name" placeholder="Nhập tên" minlength="3" maxlength="50">
            </div>

            <div class="input-group">
                <p>Địa chỉ:</p>
                <input type="text" name="address" placeholder="Nhập địa chỉ" minlength="3">
            </div>

            <div class="input-group">
                <p>Số điện thoại:</p>
                <input type="tel" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="Nhập số điện thoại">
            </div>

            <div class="input-group">
                <p>Chọn ngày giao:</p>
                <input type="date" name="delivery_date">
            </div>

            <div class="input-group">
                <p>Nhập mã giảm giá (nếu có):</p>
                <input type="text" name="discount">
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th class="col-1">Tên</th>
                        <th class="col-2">Giá</th>
                        <th class="col-3">Số lượng</th>
                        <th class="col-4">Tổng cộng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($cart as $product) { ?>
                        <tr>
                            <td class="col-1"><?= $product['pd_name'] ?></td>

                            <td class="col-2"><?= convert_currency($product['pd_price']) ?></td>

                            <td class="col-3"><?= $product['ca_quantity'] ?></td>

                            <td class="col-4">
                                <?= convert_currency($product["pd_price"] * $product["ca_quantity"]) ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="total-section">
                <p class="total-title">Tổng cộng:</p>

                <p class="total-title"> Giảm giá:</p>

                <p class="total-title">Thành tiền:</p>
            </div>

            <input type="submit" class="btn" value="Xác nhận thanh toán">
        </form>
    </div>
</div>