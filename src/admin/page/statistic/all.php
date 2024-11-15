<?php
require_css("./src/admin/css/statistic/all.css");
global $api;

$waitNumber = $api->get_order_wait_number();
$workNumber = $api->get_order_work_number();
$doneNumber = $api->get_order_done_number();
$cancelNumber = $api->get_order_cancel_number();
?>

<p class="title">Thống kê</p>

<div class="container">
    <div class="item">
        <p class="title">Đơn chờ tiếp nhận</p>

        <p class="number"><?= $waitNumber ?></p>
    </div>

    <div class="item">
        <p class="title">Đơn đang làm</p>

        <p class="number"><?= $workNumber ?></p>
    </div>

    <div class="item">
        <p class="title">Đơn đã giao</p>

        <p class="number"><?= $doneNumber ?></p>
    </div>

    <div class="item">
        <p class="title">Đơn đã hủy</p>

        <p class="number"><?= $cancelNumber ?></p>
    </div>
</div>