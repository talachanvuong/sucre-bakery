<?php
global $api;
$od_id = $_GET["od_id"];

toast_session();
$us_info = $api->get_user_info();
$us_id = $us_info["us_id"];

$order = $api->get_order_info($od_id);
?>

<div class="layout-container">
    <div class="particular-container">
        <h2 class="particular-title">Chi Tiết Đơn Hàng</h2>
            <p><strong>Mã đơn hàng: </strong> <?= $order[0]['od_id'] ?></p>

            <p><strong>Ngày đặt: </strong><?= $order[0]['od_created_on'] ?></p>

            <p><strong>Ngày Giao:  </strong><?= $order[0]['od_delivery_time'] ?></p>

            <p><strong>Tên người đặt: </strong><?= $us_info['us_name'] ?></p>

            <p><strong>Tên người nhận: </strong><?= $order[0]['od_person_receive'] ?></p>

            <p><strong>Địa chỉ: </strong><?= $order[0]['od_address'] ?></p>

            <p><strong>SĐT: </strong><?= $order[0]['od_number_phone'] ?></p>

            <h3>Danh sách sản phẩm:</h3>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $order_total = 0;
                    $order_products = $api->get_order_products_info($order[0]['od_id']);
                    foreach ($order_products as $product): 
                        $combinedPrice = $product['pd_price'] * $product['c_quantity'];
                        $order_total += $combinedPrice; ?>
                        <tr>
                            <td><?= $product['pd_name'] ?></td>
                            <td><?= $product['c_quantity'] ?></td>
                            <td><?= convert_currency($combinedPrice) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p><strong>Tổng tiền: </strong><?= convert_currency($order_total) ?></p>

            <p><strong>Tình trạng: </strong><?= $order[0]['os_name'] ?></p>

    </div>
</div>
