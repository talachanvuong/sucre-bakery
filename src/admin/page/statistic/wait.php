<?php
require_css("./src/admin/css/statistic/list.css");
global $api;

$itemPerPage = 10;
$allOrders = $api->get_orders_wait();
$totalPages = get_total_pages($itemPerPage, $allOrders);
$currentPage = get_current_page($totalPages);
$orders = $api->get_orders_wait_by_page($currentPage, $itemPerPage);
?>

<p class="title">Đơn chờ tiếp nhận</p>

<table class="table">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày giao</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($orders as $order) { ?>
            <tr>
                <td><?= $order["od_id"] ?></td>
                <td><?= $order["od_delivery_time"] ?></td>
                <td>
                    <a class="detail-button" href="?direct=detail&od_id=<?= $order["od_id"] ?>">Xem chi tiết</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="page">
    <p class="text">Trang</p>

    <form method="get">
        <input type="hidden" name="direct" value="wait">
        <input class="input" type="number" min="1" max="<?= $totalPages ?>" onchange="this.form.submit()" name="page"
            value="<?= $currentPage ?>">
    </form>

    <p class="text">
        / <?= $totalPages ?>
    </p>
</div>