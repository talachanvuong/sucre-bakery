<?php
global $api;

toast_session();

$us_info = $api->get_user_info();
$us_id = $us_info["us_id"];

$orders = $api->get_history_order($us_id);
?>

<div class="layout-container">
    <div class="history-container">
        <p class="history-title">Lịch Sử Mua Hàng</p>
        
        <?php if (empty($orders)) { ?>
            <p class="no-history">Bạn chưa có đơn hàng nào!</p>
        <?php } else { ?>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Ngày Giao Hàng</th>
                        <th>Ghi Chú</th>
                        <th>Tình Trạng</th>
                        <th>Thông Tin Đơn Hàng</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= htmlspecialchars($order['od_id']) ?></td>
                            <td><?= htmlspecialchars($order['od_created_on']) ?></td>
                            <td><?= htmlspecialchars($order['od_delivery_time']) ?></td>
                            <td><?= htmlspecialchars($order['od_reason'] ?? '') ?></td>
                            <td><?= htmlspecialchars($order['status_name'] ?? 'Chưa cập nhật') ?></td> 
                            <td>
                                <form method="post" action="order_details.php">
                                    <input type="hidden" name="od_id" value="<?= $order['od_id'] ?>">
                                    <input class="infor-btn" type="submit" value="Chi tiết">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php } ?>
    </div>
</div>
